<?php namespace App\Contracts\Validators;

use App\Contracts\Services\ValidationInterface;

interface PostValidationInterface extends ValidationInterface
{
    /**
     * @return array
     */
    public function getUpdateRules();
}