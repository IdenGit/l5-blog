<?php namespace App\Providers;

use App\Contexts\TestContext;
use App\UseCases\TestUseCase;

class UseCaseServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Test',
            function ($app, $params) {
                return new TestUseCase(
                    new TestContext($params)
                );
            }
        );
    }
}
