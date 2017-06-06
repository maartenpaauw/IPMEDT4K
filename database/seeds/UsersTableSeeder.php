<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Zowie van Geest',
            'username' => 's1097398',
            'email'    => 's1097398@student.hsleiden.nl',
            'password' => Hash::make('spinnenpoep'),
        ));
    }

}
