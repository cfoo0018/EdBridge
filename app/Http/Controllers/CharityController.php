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
    public function index(Request $request)
    {
        // Determine user's location or default to Melbourne
        $userLocation = $this->getUserLocation($request);

        // Capture the distance filter from the request
        $distanceKm = $request->input('distance', 50); // 50 km default

        // Capture the service type filter from the request
        $serviceType = $request->input('service_type', 'all');
        $serviceTypeDb = $this->mapServiceType($serviceType, true);
        // dd($serviceTypeDb);
        // Fetch charities within a bounding box
        $boundingBox = $this->calculateBoundingBox($userLocation, $distanceKm);
        $charitiesQuery = Charity::whereBetween('latitude', [$boundingBox['minLat'], $boundingBox['maxLat']])
            ->whereBetween('longitude', [$boundingBox['minLng'], $boundingBox['maxLng']]);

        // Apply category filter if not 'all'
        if ($serviceType !== 'all') {
            $charitiesQuery = $charitiesQuery->where('service_type', $serviceTypeDb);
        }

        $charities = $charitiesQuery->get();

        // Filter and sort charities by distance
        $charities = $charities->filter(function ($charity) use ($userLocation, $distanceKm) {
            $distance = $this->haversineGreatCircleDistance(
                $userLocation['lat'],
                $userLocation['lng'],
                $charity->latitude,
                $charity->longitude
            );
            $charity->distance = $distance; // Assign distance to each charity
            return $distance <= $distanceKm;
        });

        // Sort charities by distance
        $charities = $charities->sortBy('distance');

        // Format service type for display
        $charities->each(function ($charity) {
            $charity->formatted_service_type = $this->formatServiceTypeForDisplay($charity->service_type);
        });

        // Paginate manually
        $perPage = 30;
        $currentPage = $request->input('page', 1);
        $pagedCharities = $charities->slice(($currentPage - 1) * $perPage, $perPage);

        $paginatedCharities = new LengthAwarePaginator(
            $pagedCharities,
            $charities->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Fetch service types
        $serviceTypes = $this->getServiceTypes();

        return view('charities.index', [
            'charities' => $paginatedCharities,
            'serviceTypes' => $serviceTypes,
            'currentType' => $serviceType,
            'userLocation' => $userLocation,
            'distanceKm' => $distanceKm,
        ]);
    }

    protected function calculateBoundingBox($userLocation, $distanceKm)
    {
        // Approximate bounding box calculation (not precise, but quick)
        $latRadians = deg2rad($userLocation['lat']);
        $lngRadians = deg2rad($userLocation['lng']);

        // Radius of the Earth in km
        $earthRadius = 6371;

        // Approximate distance in degrees for latitude and longitude
        $deltaLat = rad2deg($distanceKm / $earthRadius);
        $deltaLng = rad2deg(asin(sin($distanceKm / ($earthRadius * cos($latRadians)))));

        // Calculate bounding box coordinates
        $minLat = $userLocation['lat'] - $deltaLat;
        $maxLat = $userLocation['lat'] + $deltaLat;
        $minLng = $userLocation['lng'] - $deltaLng;
        $maxLng = $userLocation['lng'] + $deltaLng;

        return [
            'minLat' => $minLat,
            'maxLat' => $maxLat,
            'minLng' => $minLng,
            'maxLng' => $maxLng,
        ];
    }

    protected function getUserLocation(Request $request)
    {
        if ($request->filled('search')) {
            return $this->geocodeAddress($request->input('search'));
        } elseif ($sessionLocation = $request->session()->get('user_location')) {
            return $sessionLocation;
        } else {
            return $this->geocodeAddress("Melbourne, VIC");
        }
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

    protected function sortByDistance($charities, $userLocation)
    {
        $transformed = $charities->map(function ($charity) use ($userLocation) {
            $charity->distance = $this->haversineGreatCircleDistance(
                $userLocation['lat'],
                $userLocation['lng'],
                $charity->latitude,
                $charity->longitude
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
