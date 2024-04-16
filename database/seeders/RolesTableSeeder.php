<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Check if the 'user' role already exists
        $userRole = DB::table('roles')->where('name', 'user')->first();

        if (!$userRole) {
            // Insert the 'user' role if it doesn't exist
            DB::table('roles')->insert(['name' => 'user']);
        }

        // Insert the 'admin' role if it doesn't exist
        DB::table('roles')->updateOrInsert(['name' => 'admin']);
    }
}
