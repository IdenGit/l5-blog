<?php

/** @var callable $factory */

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