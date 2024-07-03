<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FarmerSeeder extends Seeder
{
    public function run(): void
    {
        $farmers = [
            [
                'name' => 'Alex Green',
                'email' => 'alex.green@example.com',
                'phone' => 1234567890,
                'password' => Hash::make('password'),
                'address' => '456 Farm Road',
                'city' => 'Countryside',
            ],
            [
                'name' => 'Betty Crop',
                'email' => 'betty.crop@example.com',
                'phone' => 2345678901,
                'password' => Hash::make('securepassword'),
                'address' => '789 Harvest Lane',
                'city' => 'Agritown',
            ],
            [
                'name' => 'Charlie Seed',
                'email' => 'charlie.seed@example.com',
                'phone' => 3456789012,
                'password' => Hash::make('anotherpassword'),
                'address' => '101 Plow Avenue',
                'city' => 'Farmville',
            ],
            [
                'name' => 'Diana Field',
                'email' => 'diana.field@example.com',
                'phone' => 4567890123,
                'password' => Hash::make('mypassword'),
                'address' => '202 Orchard Blvd',
                'city' => 'Greenfield',
            ],
            [
                'name' => 'Evan Ranch',
                'email' => 'evan.ranch@example.com',
                'phone' => 5678901234,
                'password' => Hash::make('password123'),
                'address' => '303 Vineyard Street',
                'city' => 'Winecountry',
            ]
        ];

        DB::table('farmers')->insert($farmers);
    }
}