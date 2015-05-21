<?php namespace App\Services\Calc;

use App\Exceptions\WrongArgumentException;

class Calc
{
    public function add($a, $b)
    {
        $types = [is_int($a), is_int($b)];

        if (in_array(false, $types)) {
            throw new WrongArgumentException('Arguments have to be integer values');
        }

        return $a + $b;
    }

    public function sub($a, $b)
    {
        return $a - $b;
    }
}