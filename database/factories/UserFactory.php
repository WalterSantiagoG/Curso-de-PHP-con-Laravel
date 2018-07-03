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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'avatar' => $faker->imageUrl(300, 300, 'people'),
    ];
});

//Objeto Faker = nos va a falicitar la creacion de datos al azar
//paragraph
//realText devuelve texto basado en un libro
//words Dame palabras, true para que lo devuelva como texto, de lo contrario lo devuelve como array
$factory->define(App\Message::class, function(Faker $faker){
    return [
        'content' => $faker->realText(random_int(20, 160)), //realTime recibe como parametro la cantidad de caracteres que quiere que contenga el parrafo, colocamos un numero randon en este caso entre 20 y 160
        'image'   => $faker->imageUrl(600,338)
    ];
});