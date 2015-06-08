<?php namespace App\Providers;

class ValidationServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Validators\PostValidationInterface',
            'App\Validators\PostValidator'
        );

        $this->app->bind(
            'App\Contracts\Validators\CommentValidationInterface',
            'App\Validators\CommentValidator'
        );
    }
}