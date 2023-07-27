<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'Test@test.test',
            'password' => Hash::make('10203040'),
            'roles'=>'1',
            'phone_number'=>'+972599043747'
        ]);
    }
}
