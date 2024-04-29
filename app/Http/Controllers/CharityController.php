<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Illuminate\Http\Request;
use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CharityController extends Controller
{

    public function index(Request $request)
{
    $query = Charity::query();

    // Check for user location input and geocode if needed
    if ($request->filled('search')) {
        $userLocation = $this->geocodeAddress($request->input('search'));
        $request->session()->put('user_location', $userLocation);
        $request->session()->put('user_state', $this->getStateFromCoordinates($userLocation)); // Save state
    } else {
        // Default to Melbourne if no location is given
        $userLocation = $request->session()->get('user_location') ?? $this->geocodeAddress("Melbourne, VIC");
    }

    if ($userLocation) {
        $state = $this->getStateFromCoordinates($userLocation);
        $postcodeRange = $this->getPostcodeRangeFromCoordinates($userLocation);

        // Filter by state or postcode range
        $query->where(function ($q) use ($state, $postcodeRange) {
            if ($state) {
                $q->where('state', $state);
            }

            if ($postcodeRange) {
                $q->orWhereBetween('postcode', $postcodeRange);
            }
        });
    }

    // Filter by service type
    if ($request->has('service_type') && $request->service_type != 'all') {
        $query->where('service_type', $this->mapServiceType($request->service_type));
    }

    $serviceTypes = $this->getServiceTypes();
    $query->select('id', 'charity_legal_name', 'full_address', 'service_type', 'charity_website');
    $charities = $query->paginate(30);

    if ($userLocation) {
        $this->processCharitiesDistance($charities, $userLocation);
    }

    return view('charities.index', [
        'charities' => $charities,
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

    protected function getStateFromCoordinates($coordinates)
    {
        // Fetch the state from coordinates (implement this as needed, e.g., via reverse geocoding)
        return "VIC"; // Example hard-coded response, replace with actual logic
    }

    protected function getPostcodeRangeFromCoordinates($coordinates)
    {
        $lat = $coordinates['lat'];
        $lng = $coordinates['lng'];

        // Determine postcode range based on coordinates
        // This is a placeholder; replace it with logic to convert coordinates to postcode ranges.
        return [3000, 3999];
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

    public function geocodeCharities()
    {
        $charities = Charity::all(['charity_legal_name', 'full_address']);
        $geocodedCharities = $charities->map(function ($charity) {
            $location = $this->geocodeAddress($charity->full_address);
            if ($location) {
                return [
                    'name' => $charity->charity_legal_name,
                    'address' => $charity->full_address,
                    'latitude' => $location['lat'],
                    'longitude' => $location['lng']
                ];
            }
        });

        return response()->json($geocodedCharities->filter());
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
