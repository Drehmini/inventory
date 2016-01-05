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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Equipment::class, function (Faker\Generator $faker) {
   return [
       'serial'         => $faker->unique()->bothify('???#######'),
       'make'           => $faker->company,
       'model'          => $faker->bothify('??####'),
       'purchase_date'  => $faker->date(),
   ] ;
});

$factory->define(App\Person::class, function (Faker\Generator $faker) {
   return [
       'first_name'         => $faker->firstName,
       'last_name'          => $faker->lastName,
       'email'              => $faker->safeEmail,
       'address'            => $faker->streetAddress,
       'address_2'          => $faker->optional($weight = 0.2)->streetAddress,
       'city'               => $faker->city,
       'state'              => $faker->numberBetween(1, 51),
       'zip_code'           => $faker->postcode,
       'phone_number'       => $faker->phoneNumber,
       'created_at'         => $faker->dateTimeThisDecade,
   ];
});