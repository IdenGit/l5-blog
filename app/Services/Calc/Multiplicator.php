<?php

namespace App\Services\Calc;


class Multiplicator implements OperationInterface {
    public function handle($a,$b){
        return $a * $b;
    }

}