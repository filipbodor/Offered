<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categoriesSubcategories = [
            'Remeslá' => [
                'Maliarske práce',
                'Stavebné práce',
                'Elektrikárske práce',
                'Truhlárske práce',
                'Inštalatérske práce',
                'Kováčske a zámočnícke práce',
                'Ostatné',
            ],
            'Krása a Starostlivosť o Telo' => [
                'Kozmetické služby',
                'Kadernícke služby',
                'Masáže',
                'Manikúra a pedikúra',
                'Starostlivosť o pleť',
                'Ostatné',
            ],
            'IT a Digitálne Služby' => [
                'Webové dizajnovanie',
                'Programovanie',
                'Grafický dizajn',
                'Digital marketing',
                'Oprava a údržba počítačov',
                'Ostatné',
            ],
            'Dom a Záhrada' => [
                'Záhradnícke služby',
                'Údržba a opravy domácnosti',
                'Čistenie a upratovanie',
                'Interiérový dizajn',
                'Pestovanie a starostlivosť o rastliny',
                'Ostatné',
            ],
            'Auto a Doprava' => [
                'Autoopravárenské služby',
                'Autoumyvárka',
                'Sťahovacie služby',
                'Preprava a kurierske služby',
                'Ostatné',
            ],
            'Vzdelávanie a Doučovanie' => [
                'Jazykové kurzy',
                'Doučovanie školských predmetov',
                'Hudobné a umenécké lekcie',
                'Počítačové a technické školenia',
                'Ostatné',
            ],
            'Event a Organizácia Podujatí' => [
                'Organizácia svadieb a osláv',
                'Catering a stravovacie služby',
                'Fotografické a video služby',
                'Hudobné a DJ služby',
                'Ostatné',
            ],
            'Osobné a Domáce Služby' => [
                'Osobný asistent',
                'Starostlivosť o deti a babysitting',
                'Čistenie a upratovanie',
                'Starostlivosť o seniorov',
                'Domáci majster',
                'Ostatné',
            ],
            'Zdravie a Wellness' => [
                'Fyzioterapia a rehabilitácia',
                'Výživové poradenstvo',
                'Jóga a pilates inštruktori',
                'Osobný fitness tréner',
                'Psychologické poradenstvo',
                'Ostatné',
            ],
            'Finančné a Právne Služby' => [
                'Účtovnícke a daňové poradenstvo',
                'Právne poradenstvo a služby',
                'Finančné plánovanie a poradenstvo',
                'Poistenie a rizikové management služby',
                'Realitné a hypotekárne služby',
                'Ostatné',
            ],

        ];

        foreach ($categoriesSubcategories as $categoryName => $subcategories) {
            $category = Category::firstOrCreate(['name' => $categoryName]);

            foreach ($subcategories as $subcatName) {
                Subcategory::firstOrCreate([
                    'name' => $subcatName,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}


//php artisan db:seed --class=SubcategoriesTableSeeder
