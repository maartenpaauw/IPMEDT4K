<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\IPMEDT4K\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\IPMEDT4K\Models\Patient::class, function(Faker\Generator $faker) {
    return [
        'first_name'     => $faker->firstName,
        'last_name'      => $faker->lastName,
        'patient_number' => $faker->unique()->numberBetween(10000, 99999),
        'band_number'    => $faker->unique()->numberBetween(10000, 99999),
        'triage_id'      => \IPMEDT4k\Models\Triage::inRandomOrder()->first()->id,
        'status_id'      => \IPMEDT4k\Models\Status::inRandomOrder()->first()->id,
        'checked_in_at'  => null,
        'treated_at'     => null,
        'checked_out_at' => null,
    ];
});

$factory->state(\IPMEDT4K\Models\Patient::class, 'patient_checked_in', function(Faker\Generator $faker) {
    
    $checked_in_at = $faker->dateTimeBetween(\Carbon\Carbon::now()->subWeek(), \Carbon\Carbon::now());
    
    return [
        'checked_in_at' => $checked_in_at
    ];
});

$factory->state(\IPMEDT4K\Models\Patient::class, 'patient_treated', function(Faker\Generator $faker) {
    
    $checked_in_at = $faker->dateTimeBetween(\Carbon\Carbon::now()->subWeek(), \Carbon\Carbon::now());
    $treated_at    = $faker->dateTimeBetween($checked_in_at, \Carbon\Carbon::now());

    return [
        'checked_in_at' => $checked_in_at,
        'treated_at'    => $treated_at
    ];   
});

$factory->state(\IPMEDT4K\Models\Patient::class, 'patient_checked_out', function(Faker\Generator $faker) {
    
    $checked_in_at  = $faker->dateTimeBetween(\Carbon\Carbon::now()->subWeek(), \Carbon\Carbon::now());
    $treated_at     = $faker->dateTimeBetween($checked_in_at, \Carbon\Carbon::now());
    $checked_out_at = $faker->dateTimeBetween($treated_at, \Carbon\Carbon::now());
    
    return [
        'checked_in_at'  => $checked_in_at,
        'treated_at'     => $treated_at,
        'checked_out_at' => $checked_out_at
    ];
});