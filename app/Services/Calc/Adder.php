<?php namespace App\Services\Calc;

class Adder implements OperationInterface
{
    public function handle($a, $b)
    {
        return $a + $b;
    }
}