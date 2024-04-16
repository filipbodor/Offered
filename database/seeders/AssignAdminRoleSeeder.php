<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssignAdminRoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            // Update specific users with the 'admin' role
            User::whereIn('id', [21]) // Replace with the user IDs you want to make admin
            ->update(['role_id' => $adminRole->id]);
        }
    }
}

//php artisan db:seed --class=AssignAdminRoleSeeder
