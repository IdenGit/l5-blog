<?php namespace App\Services\Calc;

class Substractor implements OperationInterface
{
    public function handle($a, $b)
    {
        return $a - $b;
    }
}