<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(2);
    return [
        'title' => $title,
        'body' => $faker->paragraph,
        'slug' => str_slug($title)
    ];
});

$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
