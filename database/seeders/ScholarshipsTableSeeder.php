<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;

class ScholarshipsTableSeeder extends Seeder
{
    public function run()
    {
        // Path to the CSV file
        $csvPath = storage_path('app/scholarships_final.csv');

        // Read the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0); //set the CSV header offset

        // Process each row of the CSV as an associative array
        $records = $csv->getRecords();

        foreach ($records as $record) {
            // Remove $ and commas from the amount
            $amount = str_replace(['$', ','], '', $record['amount']);
        
            DB::table('scholarships')->insert([
                'for_international_students' => $record['for_international_students'] === 'yes',
                'description' => $record['description'],
                'gender' => $record['gender'],
                'provider' => $record['provider'],
                'level_of_study' => $record['level_of_study'],
                'for_australian_students' => $record['for_australian_students'] === 'yes',
                'title' => $record['title'],
                'more_information_url' => $record['more_information'],
                'field_of_study' => $record['field_of_study'],
                'frequency' => $record['frequency'],
                'number_per_year' => is_numeric($record['number_per_year']) ? (int)$record['number_per_year'] : null,
                'student_type' => $record['student_type'],
                'eligibility' => $record['eligibility'],
                'duration' => $record['duration'],
                'closing_date' => $record['closing_date'],
                'amount' => is_numeric($amount) ? (float)$amount : null,  // Convert string to float after cleaning
            ]);
        }        
    }
}
