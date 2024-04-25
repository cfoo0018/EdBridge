<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Illuminate\Http\Request;
use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;
use Illuminate\Support\Facades\Log;

class CharityController extends Controller
{
    public function index(Request $request)
    {
        $query = Charity::query();
        $userLocation = $request->session()->get('user_location');

        if ($request->filled('search') && !$userLocation) {
            $userLocation = $this->geocodeAddress($request->search);
            $request->session()->put('user_location', $userLocation);
        }

        if ($request->has('service_type') && $request->service_type != 'all') {
            $query->where('service_type', $this->mapServiceType($request->service_type));
        }

        $serviceTypes = $this->getServiceTypes();
        $query->select('id', 'charity_legal_name', 'full_address', 'service_type', 'charity_website');
        $charities = $query->paginate(15);

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

            Log::info('Geocoding API raw response:', ['response' => $response]);

            $responseData = json_decode($response, true);

            if (!empty($responseData['status']) && $responseData['status'] === 'OK') {
                if (!empty($responseData['results'][0]['geometry']['location'])) {
                    return $responseData['results'][0]['geometry']['location'];
                } else {
                    Log::warning('No geocoding results found for the given address.', ['address' => $address]);
                }
            } else {
                Log::warning('Geocoding API returned status other than OK.', ['status' => $responseData['status']]);
            }
        } catch (\Exception $e) {
            Log::error('Geocoding request failed.', ['error' => $e->getMessage()]);
        }

        return null;
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
            'people_with_chronic_illness' => 'People with Chronic Illness',
            'advancing_culture' => 'Advancing Culture',
            'gay_lesbian_bisexual' => 'LGBTQ+',
        ];
    }

    protected function isAddressComplete($address)
    {
        // Check if the address has at least one comma, suggesting it includes more than one part
        return strpos($address, ',') !== false && !preg_match('/,,/', $address);
    }

    protected function processCharitiesDistance($charities, $userLocation)
    {
        // Transform the collection to compute distances
        $transformed = $charities->getCollection()->map(function ($charity) use ($userLocation) {
            if ($this->isAddressComplete($charity->full_address)) {
                $charity->formatted_service_type = $this->formatServiceTypeForDisplay($charity->service_type);
                $charityLocation = $this->geocodeAddress($charity->full_address);
                if ($charityLocation) {
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

        // Sort by distance and update the original collection
        $sorted = $transformed->sortBy('distance');
        $charities->setCollection($sorted);
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

    protected function formatServiceTypeForDisplay($type)
    {
        return ucwords(str_replace('_', ' ', $type));
    }

    public function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
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
}
