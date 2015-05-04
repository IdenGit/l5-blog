<?php
namespace App\Services\Calc;


class Exponentater implements OperationInterface {
    public function handle($a,$b){
        return pow($a,$b);
    }
}