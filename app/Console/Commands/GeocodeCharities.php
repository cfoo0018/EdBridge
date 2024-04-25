<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Charity;
use GoogleMaps\GoogleMaps;

class GeocodeCharities extends Command
{
    protected $signature = 'geocode:charities';
    protected $description = 'Geocode all charities that need geocoding';

    public function handle()
    {
        $charities = Charity::whereNull('latitude')->orWhereNull('longitude')->get();
        
        foreach ($charities as $charity) {
            if (!empty($charity->address)) {
                $coordinates = $this->geocodeAddress($charity->address);
                if ($coordinates) {
                    $charity->latitude = $coordinates['lat'];
                    $charity->longitude = $coordinates['lng'];
                    $charity->save();
                    $this->info("Geocoded: {$charity->name}");
                }
            }
        }
    }

    private function geocodeAddress($address)
    {
        $googleMaps = new GoogleMaps(env('GOOGLE_MAPS_API_KEY'));
        $response = $googleMaps->load('geocoding')
                                ->setParam(['address' => $address])
                                ->get();

        if (!empty($response['results'][0]['geometry']['location'])) {
            return $response['results'][0]['geometry']['location'];
        }

        return null;
    }
}
