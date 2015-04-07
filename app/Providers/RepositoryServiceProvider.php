<?php namespace App\Providers;

class RepositoryServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\PostRepositoryInterface',
            'App\Repositories\PostEloquentRepository'
        );
        $this->app->bind(
            'App\Contracts\Repositories\CommentRepositoryInterface',
            'App\Repositories\CommentEloquentRepository'
        );
    }
}