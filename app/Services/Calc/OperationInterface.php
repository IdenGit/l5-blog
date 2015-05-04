<?php
namespace App\Services\Calc;

interface OperationInterface {
    public function handle($a, $b);
}