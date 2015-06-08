<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');




Route::resource('post', 'Post\PostController');
Route::resource('comment', 'Post\CommentsController');

Route::get(
    'posts/success',
    ['uses' => 'Post\PostController@show_created_message', 'as' => 'posts.show_created_message']
);

Route::get(
    'comments/success',
    ['uses' => 'Post\CommentsController@show_created_message', 'as' => 'comments.show_created_message']
);

Route::controllers(
    [
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]
);

Route::get(
    'test',
    ['uses' => 'HomeController@test']
);