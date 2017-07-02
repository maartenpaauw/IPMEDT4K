<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        // Current date.
        $date = \Carbon\Carbon::now();

        // Create the users.
        User::insert([
            [
                'name'       => 'Zowie van Geest',
                'email'      => 's1097398@student.hsleiden.nl',
                'password'   => Hash::make(env('USERS_PASSWORD')),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name'       => 'Maarten Paauw',
                'email'      => 's1094220@student.hsleiden.nl',
                'password'   => Hash::make(env('USERS_PASSWORD')),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name'       => 'Gerson Straver',
                'email'      => 's1096138@student.hsleiden.nl',
                'password'   => Hash::make(env('USERS_PASSWORD')),
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }

}
