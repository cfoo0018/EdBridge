<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;

class CharityController extends Controller
{

    public function index(Request $request) {
        // Determine the user's location or default to Melbourne
        $userLocation = $request->filled('search')
            ? $this->geocodeAddress($request->input('search'))
            : $request->session()->get('user_location') ?? $this->geocodeAddress("Melbourne, VIC");
    
        $request->session()->put('user_location', $userLocation);
    
        // Default to Melbourne if geocoding fails
        if (!$userLocation) {
            $userLocation = $this->geocodeAddress("Melbourne, VIC");
        }
    
        // Calculate geographical ranges for proximity filtering
        $latRange = 50 / 111; // 50 km radius to latitude range
        $lngRange = 50 / (111 * cos(deg2rad($userLocation['lat']))); // Longitude range conversion
    
        $minLat = $userLocation['lat'] - $latRange;
        $maxLat = $userLocation['lat'] + $latRange;
        $minLng = $userLocation['lng'] - $lngRange;
        $maxLng = $userLocation['lng'] + $lngRange;
    
        $query = Charity::whereBetween('latitude', [$minLat, $maxLat])
                        ->whereBetween('longitude', [$minLng, $maxLng]);
    
        // Filter by service type if specified
        if ($request->has('service_type') && $request->service_type != 'all') {
            $query->where('service_type', $this->mapServiceType($request->service_type));
        }
    
        // Select necessary columns
        $charities = $query->select('id', 'charity_legal_name', 'full_address', 'service_type', 'latitude', 'longitude', 'charity_website')->get();
    
        // Sort by distance
        $sortedCharities = $this->sortByDistance($charities, $userLocation);
    
        // Paginate manually
        $perPage = 30;
        $currentPage = $request->input('page', 1);
        $pagedCharities = $sortedCharities->slice(($currentPage - 1) * $perPage, $perPage);
    
        // Return the paged result with pagination links
        $paginatedCharities = new LengthAwarePaginator(
            $pagedCharities, 
            $sortedCharities->count(), 
            $perPage, 
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        // Fetch service types
        $serviceTypes = $this->getServiceTypes();
    
        return view('charities.index', [
            'charities' => $paginatedCharities,
            'serviceTypes' => $serviceTypes,
            'currentType' => $request->service_type ?? 'all',
            'userLocation' => $userLocation,
        ]);
    }
    
    protected function geocodeAddress($address)
    {
        try {
            $response = GoogleMaps::load('geocoding')
                ->setParam(['address' => $address, 'key' => env('GOOGLE_MAPS_API_KEY')])
                ->get();
            $data = json_decode($response, true);

            if ($data['status'] === 'OK' && isset($data['results'][0]['geometry']['location']['lat']) && isset($data['results'][0]['geometry']['location']['lng'])) {
                return [
                    'lat' => $data['results'][0]['geometry']['location']['lat'],
                    'lng' => $data['results'][0]['geometry']['location']['lng'],
                ];
            } else {
                Log::warning('Geocoding failed:', ['address' => $address, 'response' => $data]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Geocoding exception:', ['error' => $e->getMessage()]);
            return null;
        }
    }

    protected function sortByDistance($charities, $userLocation) {
        $transformed = $charities->map(function ($charity) use ($userLocation) {
            $charity->distance = $this->haversineGreatCircleDistance(
                $userLocation['lat'], $userLocation['lng'],
                $charity->latitude, $charity->longitude
            );
            return $charity;
        });
    
        $sorted = $transformed->sortBy('distance');
    
        return $sorted;
    }    

    protected function getServiceTypes()
    {
        return [
            'all' => 'All',
            'youth' => 'Youth',
            'adults' => 'Adults',
            'families' => 'Families',
            'general_community_in_australia' => 'General Community in Australia',
            'advancing_religion' => 'Advancing Religion',
            'financially_disadvantaged' => 'Financially Disadvantaged',
            'rural_regional_remote_communities' => 'Rural, Regional, Remote Communities',
            'ethnic_groups' => 'Ethnic Groups',
            'people_with_disabilities' => 'People with Disabilities',
            'advancing_social_or_public_welfare' => 'Advancing Social or Public Welfare',
            'advancing_education' => 'Advancing Education',
            'people_at_risk_of_homelessness' => 'People at Risk of Homelessness',
            'unemployed_person' => 'Unemployed Person',
            'people_with_chronic illness' => 'People with Chronic Illness',
            'advancing culture' => 'Advancing Culture',
            'gay_lesbian_bisexual' => 'LGBTQ+',
        ];
    }

    protected function mapServiceType($type)
    {
        return [
            'youth' => 'Youth',
            'adults' => 'Adults',
            'families' => 'Families',
            'general_community_in_australia' => 'General_Community_in_Australia',
            'advancing_religion' => 'Advancing_Religion',
            'financially_disadvantaged' => 'Financially_Disadvantaged',
            'rural_regional_remote_communities' => 'Rural_Regional_Remote_Communities',
            'ethnic_groups' => 'Ethnic_Groups',
            'people_with_disabilities' => 'People_with_Disabilities',
            'advancing_social_or_public_welfare' => 'Advancing_Social_or_Public_Welfare',
            'advancing_education' => 'Advancing_Education',
            'people_at_risk_of_homelessness' => 'People_at_Risk_of_Homelessness',
            'unemployed_person' => 'Unemployed_Person',
            'people_with_chronic_illness' => 'People_with_Chronic_Illness',
            'advancing_culture' => 'Advancing_Culture',
            'gay_lesbian_bisexual' => 'Gay_Lesbian_Bisexual'
        ][strtolower($type)] ?? $type;
    }

    protected function processCharitiesDistance($charities, $userLocation)
    {
        $transformed = $charities->getCollection()->map(function ($charity) use ($userLocation) {
            if ($this->isAddressComplete($charity->full_address)) {
                $charity->formatted_service_type = $this->formatServiceTypeForDisplay($charity->service_type);
                $charityLocation = $this->geocodeAddress($charity->full_address);
                if ($charityLocation) {
                    $charity->latitude = $charityLocation['lat'];
                    $charity->longitude = $charityLocation['lng'];
                    $charity->distance = $this->haversineGreatCircleDistance(
                        $userLocation['lat'],
                        $userLocation['lng'],
                        $charityLocation['lat'],
                        $charityLocation['lng']
                    );
                }
                return $charity;
            }
            return null;
        })->filter();

        // Sort charities by distance
        $sorted = $transformed->sortBy('distance');
        $charities->setCollection($sorted);
    }

    protected function isAddressComplete($address)
    {
        // Check if the address has at least one comma and no consecutive commas, suggesting a complete structure
        return strpos($address, ',') !== false && !preg_match('/,,/', $address);
    }
    protected function formatServiceTypeForDisplay($type)
    {
        // Convert underscores to spaces and capitalize the first letter of each word
        return ucwords(str_replace('_', ' ', $type));
    }

    protected function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    public function searchSuggestions(Request $request)
    {
        $searchTerm = $request->input('term');
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $response = Http::get("https://maps.googleapis.com/maps/api/place/autocomplete/json", [
            'input' => $searchTerm,
            'types' => 'geocode',
            'language' => 'en',
            'components' => 'country:au', // Restrict to Australia
            'key' => $apiKey
        ]);

        $suggestions = json_decode($response->body(), true);

        if ($suggestions['status'] == 'OK') {
            // Transforming the response to match expected format
            $formattedSuggestions = array_map(function ($item) {
                return ['label' => $item['description'], 'value' => $item['description']];
            }, $suggestions['predictions']);

            return response()->json($formattedSuggestions);
        } else {
            Log::warning('Google Places API call failed:', ['response' => $suggestions]);
            return response()->json([]);
        }
    }
}
