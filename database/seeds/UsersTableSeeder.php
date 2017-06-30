<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Zowie',
            'email' => 's1097398@student.hsleiden.nl',
            'password' => Hash::make('spinnenpoep'),
        ]);
    }

}
