<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//https://github.com/fzaninotto/Faker/#fakerproviderlorem
$factory->define(App\Model\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6,true),
        'content' => $faker->paragraph($nbSentences = 15, $variableNbSentences = true),
        'user_id' => rand(1,10),
    ];
});
