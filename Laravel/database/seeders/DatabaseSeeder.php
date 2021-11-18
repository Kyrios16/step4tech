<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('password'),
                'profile_img' => 'profile_default.png',
                'cover_img' => 'cover_default.png',
                'github' => 'https://github.com/Kyrios16',
                'linkedin' => 'https://linkedIn',
                'bio' => 'Blah Blah',
                'date_of_birth' => '1990-12-12',
                'ph_no' => '09876345213',
                'position' => 'COO',
                'role' => '0',
                'created_user_id' => 1,
                'updated_user_id' => 1,
            ]
        );
    }
}
