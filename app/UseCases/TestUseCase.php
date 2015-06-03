<?php namespace App\UseCases;

use App\Contexts\TestContext;

class TestUseCase extends BaseUseCase
{
    public function __construct(TestContext $c)
    {
        parent::__construct($c);
    }

    public function call()
    {
        $c = $this->context();

        if (!$c['data']) {
            $c->failValidation(['No data']);
        }

        return $c;
    }
}