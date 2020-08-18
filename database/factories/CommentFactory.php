<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $body = $faker->text();
    return [
        'user_id' 		    => rand(1,9),
        'publication_id' 	=> rand(1,150),
        'content' 			=> $body
    ];
});
