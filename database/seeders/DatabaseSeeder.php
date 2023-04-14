<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'first_name' => 'Pera',
            'last_name' => 'Peric',
            'address' => 'address1',
            'email' => 'pera@gmail.com',
            'password' => Hash::make('pera123'),
            'type' => 'customer',
        ]);
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'address' => 'address2',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'type' => 'admin',
        ]);
        Restaurant::create([
            'name' => 'McDonalds',
            'address' => 'address3',
            'email' => 'mcdonalds@gmail.com',
            'password' => Hash::make('mac123')
        ]);

        User::factory()->count(10)->create();
        Restaurant::factory()->count(10)->create();
        Item::factory()->count(20)->create();
    }
}
