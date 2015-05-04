<?php

namespace App\Services\Calc;


class Modder implements OperationInterface {
    public function handle($a, $b){
        return $a % $b;
    }
}