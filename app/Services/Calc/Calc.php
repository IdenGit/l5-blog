<?php
namespace App\Services\Calc;

class Calc
{

    public function __construct(
        Adder $add,
        Substractor $sub,
        Multiplicator $mul,
        Divider $div,
        Exponentater $exp,
        NthRoot $root,
        Modder $mod
    ) {
        $this->adder = $add;
        $this->substractor = $sub;
        $this->multiplicator = $mul;
        $this->divider = $div;
        $this->exponentater = $exp;
        $this->nth_root = $root;
        $this->modder = $mod;
    }

    public function add($a, $b)
    {
        return $this->adder->handle($a,$b);
    }

    public function substract($a, $b)
    {
        return $this->substractor->handle($a,$b);
    }

    public function multiply($a, $b)
    {
        return $this->multiplicator->handle($a,$b);
    }

    public function divide($a, $b)
    {
        return $this->divider->handle($a,$b);
    }

    public function exponentate($a, $b)
    {
        return $this->exponentater->handle($a,$b);
    }

    public function nth_root($a, $b)
    {
        return $this->nth_root->handle($a,$b);
    }

    public function mod($a, $b)
    {
        return $this->modder->handle($a,$b);
    }

}