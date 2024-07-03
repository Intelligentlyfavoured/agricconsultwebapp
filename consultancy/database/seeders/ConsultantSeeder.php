<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $consultants = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '1234567890',
                'password' => 'password',
                'address' => '123 Main St',
                'city' => 'Anytown',
                'specialization' => 'Specializing in sustainable agricultural practices and organic farming techniques.',
                'experience' => '5 years',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '0987654321',
                'password' => 'securepassword',
                'address' => '456 Side St',
                'city' => 'Othertown',
                'specialization' => 'Expert in crop rotation strategies and soil health improvement for increased yield.',
                'experience' => '7 years',
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'phone' => '1122334455',
                'password' => 'anotherpassword',
                'address' => '789 Circle Ave',
                'city' => 'Roundtown',
                'specialization' => 'Focused on innovative irrigation techniques and water conservation in farming.',
                'experience' => '4 years',
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'phone' => '2233445566',
                'password' => 'mypassword',
                'address' => '101 High St',
                'city' => 'Talltown',
                'specialization' => 'Specializes in the integration of technology in farming for precision agriculture.',
                'experience' => '6 years',
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charlie.davis@example.com',
                'phone' => '3344556677',
                'password' => 'password123',
                'address' => '202 Wide Rd',
                'city' => 'Broadtown',
                'specialization' => 'Expertise in livestock management and animal welfare practices in farming.',
                'experience' => '8 years',
            ]
        ];

        foreach ($consultants as &$consultant) {
            $consultant['password'] = Hash::make($consultant['password']);
            $consultant['created_at'] = now();
            $consultant['updated_at'] = now();
        }

        DB::table('consultants')->insert($consultants);
    }
}