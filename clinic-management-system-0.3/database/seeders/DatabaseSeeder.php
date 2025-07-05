<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        User::create([
            'name' => 'Dark Clinic',
            'email' => 'dark.official@clin.de',
            'password' => Hash::make('123456789'),
            'role_id' => 1
        ]);
    }
}
