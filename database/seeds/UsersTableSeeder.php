<?php

use Illuminate\Database\Seeder;
use IPMEDT4K\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'employee_number' => '450125',
            'first_name' => 'Zowie',
            'last_name' => 'van Geest',
            'email' => 's1097398@student.hsleiden.nl',
            'password' => Hash::make('spinnenpoep'),
        ]);
    }

}
