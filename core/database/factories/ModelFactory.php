<?php

use Faker\Generator as Faker;
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
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'passport' => null,
        'active' => true,
        'who' => 5,
        'email' => 'iptv@nigcomsat.com',
        'password' => bcrypt('password'),
        'creator_key' => null,
        'unid' => 'iAmTheDeveloper',
        'countdown_pass' => null,
        'reset_toke' => null,
    ];
});

$factory->define(App\Models\Plan::class, function(Faker $faker){
   return [
       'unid' => $faker->unique(),
       'name' => 'Freemium',
       'info' => 'Two Weeks',
       'type' => 'Free',
       'cost' => 'NGN 0',
       'duration' => 1209600,
       'duration_info' => 'Free Two Weeks Subscription for First Registration',
       'active' => true,
       'default' => true,
       'creator_key' => 'BenIceIsYourMaker',
   ];
});

