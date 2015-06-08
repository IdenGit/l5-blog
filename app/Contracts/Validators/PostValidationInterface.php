<?php namespace App\Contracts\Validators;

use App\Contracts\Services\ValidationInterface;

/**
 * Interface PostValidationInterface
 * @package App\Contracts\Validators
 */
interface PostValidationInterface extends ValidationInterface
{
    /**
     * @return array
     */
    public function getUpdateRules();
}