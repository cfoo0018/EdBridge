<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Charity;
use GoogleMaps\Facade\GoogleMapsFacade as GoogleMaps;
use Illuminate\Support\Facades\Log;

class GeocodeCharities extends Command {
    protected $signature = 'charities:geocode';
    protected $description = 'Geocode charities and populate missing data.';

    public function handle() {
        $charities = Charity::all();

        $charities->each(function ($charity) {
            if (!$charity->latitude || !$charity->longitude || !$charity->state) {
                $geocodeResult = $this->geocodeAddress($charity->full_address);
                if ($geocodeResult) {
                    $charity->latitude = $geocodeResult['location']['lat'];
                    $charity->longitude = $geocodeResult['location']['lng'];
                    $charity->state = $geocodeResult['state'];
                    $charity->save();

                    Log::info("Charity {$charity->id} geocoded successfully.", ['location' => $geocodeResult['location'], 'state' => $geocodeResult['state']]);
                } else {
                    Log::warning("Failed to geocode charity {$charity->id}.");
                }
            }
        });

        $this->info('Charities geocoded successfully.');
    }

    protected function geocodeAddress($address) {
        if (!$address) {
            Log::warning("No address provided for geocoding.");
            return null;
        }

        try {
            $response = GoogleMaps::load('geocoding')
                ->setParam(['address' => $address, 'key' => env('GOOGLE_MAPS_API_KEY')])
                ->get();

            $data = json_decode($response, true);

            if ($data['status'] === 'OK') {
                $result = $data['results'][0];
                $location = $result['geometry']['location'];

                $state = null;
                foreach ($result['address_components'] as $component) {
                    if (in_array('administrative_area_level_1', $component['types'])) {
                        $state = $component['short_name'];
                        break;
                    }
                }

                return [
                    'location' => $location,
                    'state' => $state,
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
}