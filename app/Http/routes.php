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

Route::controllers(
    [
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]
);

class slon
{
    public function go($shag)
    {
        return $shag*1000;
    }
}

class calk
{
    public function sum($a = 1, $b = 2)
    {
        return $a + $b;
    }

    public function sum_slon($a = 1)
    {
        return $a;
    }


}


Route::get(
    'posts/success',
    ['uses' => 'Post\PostController@show_created_message', 'as' => 'posts.show_created_message']
);

Route::get('calc/{a}/{b}', function (calk $c, $a, $b) {
    //$c = new calk();
    return $c->sum_slon($a);
});