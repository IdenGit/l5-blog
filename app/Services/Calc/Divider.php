<?php
namespace App\Services\Calc;


class Divider implements OperationInterface {
    public function handle($a, $b){
        return $a / $b;
    }
}