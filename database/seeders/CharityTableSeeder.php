<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Charity;
use League\Csv\Reader; 

class CharityTableSeeder extends Seeder
{
    public function run()
    {
        // `storage/app` directory
        $csv = Reader::createFromPath(storage_path('app/pp_data.csv'), 'r');
        $csv->setHeaderOffset(0); // Set the CSV header offset

        foreach ($csv as $record) {
            // Charity::create([
            //     'charity_legal_name' => $record['Charity_Legal_Name'],
            //     'full_address' => $record['Full_Address'],
            //     'charity_website' => $record['Charity_Website'],
            //     'service_type' => $record['Service_Type']
            // ]);
            Charity::updateOrCreate(
                ['charity_legal_name' => $record['Charity_Legal_Name']],
                [
                    'postcode' => $record['Postcode'],
                    'state' => $record['State']
                ]
            );
        }
    }
}
