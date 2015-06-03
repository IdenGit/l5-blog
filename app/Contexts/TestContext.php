<?php namespace App\Contexts;

class TestContext extends BaseContext
{
    public function __construct($data = [])
    {
        parent::__construct(get_defined_vars());
    }
}