<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsSeeder extends Seeder
{
    public function run()
    {
        // Get the list of all advertisement IDs and user IDs
        $advertisementIds = DB::table('advertisements')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Define the range of ratings per advertisement
        $minRatingsPerAd = 3;
        $maxRatingsPerAd = 15;

        foreach ($advertisementIds as $advertisementId) {
            // Randomly select the number of ratings for this advertisement
            $numberOfRatings = rand($minRatingsPerAd, $maxRatingsPerAd);

            // Shuffle the user IDs to randomize selection
            shuffle($userIds);

            // Take the first N user IDs based on the number of ratings
            $selectedUserIds = array_slice($userIds, 0, $numberOfRatings);

            // Insert ratings for this advertisement
            for ($i = 0; $i < $numberOfRatings; $i++) {
                DB::table('ratings')->insert([
                    'advertisement_id' => $advertisementId,
                    'user_id' => $selectedUserIds[$i],
                    'rating' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}


