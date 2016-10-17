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

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->dateTimeBetween('-30 days', 'now'),
        'description' => $faker->paragraphs(3),
        'amount' => $faker->numberBetween(1, 100000),
        'beneficiary_id' => $faker->numberBetween(1, 20),
        'category_id' => $faker->numberBetween(1, 20),
        'account_id' => $faker->numberBetween(1, 20),
        'user_id' => $faker->numberBetween(1, 20),
    ];
});

$faker->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->paragraphs(2)
    ];
});