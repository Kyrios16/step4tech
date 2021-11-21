<?php

namespace Database\Seeders;

use DateTime;
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
        // DB::table('users')->truncate();
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('password'),
                'profile_img' => 'profile_20211121181319.jpg',
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

        DB::table('posts')->insert(
            [
                [
                    'title' => 'admin',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-22'),
                    'updated_at' => Date('2021-11-22'),
                ],
                [
                    'title' => 'tue',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-23'),
                    'updated_at' => Date('2021-11-23'),
                ],
                [
                    'title' => 'wed',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-24'),
                    'updated_at' => Date('2021-11-24'),
                ],
                [
                    'title' => 'tur',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-25'),
                    'updated_at' => Date('2021-11-25'),
                ],
                [
                    'title' => 'fri',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-26'),
                    'updated_at' => Date('2021-11-26'),
                ],
                [
                    'title' => 'sat',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-27'),
                    'updated_at' => Date('2021-11-27'),
                ],
                [
                    'title' => 'sun',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-28'),
                    'updated_at' => Date('2021-11-28'),
                ],
                [
                    'title' => 'mon2',
                    'content' => 'admin123@gmail.com',
                    'photo' => 'profile_default.png',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => Date('2021-11-29'),
                    'updated_at' => Date('2021-11-29'),
                ],
            ]
        );

        DB::table('categories')->insert(
            [
                [
                    'name' => 'Laravel',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                ],
                [
                    'name' => 'JavaScript',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                ],
                [
                    'name' => 'Jquery',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                ],
                [
                    'name' => 'Java',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                ],
                [
                    'name' => 'PHP',
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                ],
            ]
        );
    }
}
