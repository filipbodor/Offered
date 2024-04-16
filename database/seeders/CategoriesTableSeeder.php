<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Remeslá', 'image_path' => 'images/categories/crafts.jpg'],
            ['name' => 'Krása a Starostlivosť o Telo', 'image_path' => 'images/categories/beauty.jpg'],
            ['name' => 'IT a Digitálne Služby', 'image_path' => 'images/categories/it_services.jpg'],
            ['name' => 'Dom a Záhrada', 'image_path' => 'images/categories/home_garden.jpg'],
            ['name' => 'Auto a Doprava', 'image_path' => 'images/categories/auto_transport.jpg'],
            ['name' => 'Vzdelávanie a Doučovanie', 'image_path' => 'images/categories/education.jpg'],
            ['name' => 'Event a Organizácia Podujatí', 'image_path' => 'images/categories/events.jpg'],
            ['name' => 'Osobné a Domáce Služby', 'image_path' => 'images/categories/personal_services.jpg'],
            ['name' => 'Zdravie a Wellness', 'image_path' => 'images/categories/health.jpg'],
            ['name' => 'Finančné a Právne Služby', 'image_path' => 'images/categories/financial_services.jpg'],

        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], ['image_path' => $category['image_path']]);
        }
    }
}


//php artisan db:seed --class=CategoriesTableSeeder
