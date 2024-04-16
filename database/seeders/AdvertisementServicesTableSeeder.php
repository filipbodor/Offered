<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementServicesTableSeeder extends Seeder
{
    public function run()
    {
        $advertisements = Advertisement::all();

        foreach ($advertisements as $advertisement) {
            $numberOfServices = rand(1, 3);

            for ($i = 0; $i < $numberOfServices; $i++) {
                DB::table('advertisement_services')->insert([
                    'advertisement_id' => $advertisement->id,
                    'service_name' => $this->getServiceName(),
                    'price' => $this->getServicePrice(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function getServiceName()
    {
        $services = [
            'Základný balíček',
            'Štandardný balíček',
            'Prémiový balíček',
        ];

        return $services[array_rand($services)];
    }

    private function getServicePrice()
    {
        return rand(5, 50);
    }
}
