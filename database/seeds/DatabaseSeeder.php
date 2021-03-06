<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Eloquent::unguard();
         $this->call(UsersTableSeeder::class);
         $this->call(TriagesTableSeeder::class);
         $this->call(StatusTableSeeder::class);
         $this->call(TriageComparisonTableSeeder::class);
    }
}
