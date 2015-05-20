<?php

/** @var callable $factory */

$faker->locale('ru_RU');


// User
$factory(
    'App\Models\User',
    'user',
    [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'password' => $faker->sha1,
    ]
);

// Post
$factory(
    'App\Models\Post',
    'post',
    [
        'user_id' => 'factory:user',
        'title' => $faker->word,
        'content' => $faker->paragraph()
    ]
);

// Comment
$factory(
    'App\Models\Comment',
    'comment',
    [
        'user_id' => 'factory:user',
        'post_id' => 'factory:post',
        'content' => $faker->paragraph()
    ]
);