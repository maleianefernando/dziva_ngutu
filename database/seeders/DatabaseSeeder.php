<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            "name"=> "admin",
            "lastname"=> "admin",
            "email"=> "admin@gmail.com",
            "role"=> "admin",
            "type"=> "user",
            "uploads"=> 0,
            "password"=> "passpass",
        ]);
    }
}
