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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Goal::class, function (Faker\Generator $faker){

    return [
        'name' => $faker->sentence,
        'inactive' => 0,
    ];
});

$factory->define(App\Assessor::class, function (Faker\Generator $faker){

    return [
        'username' => $faker->userName,
        'name' => $faker->name,
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker){

    return [
        'name' => $faker->sentence,
        'mission' => $faker->sentence,
    ];
});

$factory->define(App\Assessment::class, function (Faker\Generator $faker){

    return [
        'assessor_id' => function () {
                return factory('App\Assessor')->create()->id;
        },
        'period' => '2018',
        'slo_id' => rand(1,200),
        'goal_id' => rand(1,7),
        'team_id' => rand(1,30),
        'course' => $faker->word,
        'method' => $faker->sentence,
        'measure' => $faker->sentence,
    ];
});

$factory->define(App\Slo::class, function (Faker\Generator $faker){

    return [
        'name' => $faker->sentence,
        'team_id' => rand(1,30),
        'team_id' => function () {
            return factory('App\Team')->create()->id;
        },
        'inactive' => 0,
    ];
});
