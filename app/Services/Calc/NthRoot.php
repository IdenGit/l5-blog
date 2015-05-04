<?php

namespace App\Services\Calc;


class NthRoot implements OperationInterface{
    public function handle($a, $b){
        return pow( $a, 1/$b );
    }
}