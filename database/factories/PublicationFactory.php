<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Publication;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {

    $title = $faker->sentence(4);

    return [
        'user_id' 		=> rand(1,10),
        'name' 			=> $title,
        'slug' 			=> Str::slug($title, '-'),
        'status'        => $faker->randomElement(['BORRADOR', 'APROBADO'])
    ];
});
