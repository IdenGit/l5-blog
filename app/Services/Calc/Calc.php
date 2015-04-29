<?php namespace App\Services\Calc;

class Calc
{
    private $adder;
    private $substractor;

    public function __construct(Adder $adder, Substractor $substractor)
    {
        $this->adder = $adder;
        $this->substractor = $substractor;
    }

    public function add($a, $b)
    {
        return $this->adder->handle($a, $b);
    }

    public function sub($a, $b)
    {
        return $this->substractor->handle($a, $b);
    }
}