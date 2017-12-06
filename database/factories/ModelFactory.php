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
$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    return [
        'cedula' => $faker->randomNumber(8),
        'usuario' => $faker->userName,
        'nombre' => $faker->firstName(),
        'apellido' => $faker->lastName,
        'bloqueado' => $faker->boolean(50)
    ];
});
