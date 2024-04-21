<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        $filePath = database_path('data/SK_.txt');
        $file = new \SplFileObject($filePath);

        while (!$file->eof()) {
            $line = $file->fgets();
            $data = explode("\t", $line);

            if (count($data) >= 3) {
                Location::create([
                    'name' => $data[0],
                    'latitude' => $data[1],
                    'longitude' => $data[2],
                ]);
            }
        }
    }
}
//php artisan db:seed --class=LocationsSeeder
