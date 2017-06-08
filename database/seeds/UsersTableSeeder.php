<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name'     => 'Zowie van Geest',
            'username' => 's1097398',
            'email'    => 's1097398@student.hsleiden.nl',
            'password' => Hash::make('spinnenpoep'),
        ]);
    }

}
