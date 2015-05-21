<?php namespace App\Contracts\Services;

interface ValidationInterface
{
    /**
     * @param array $input
     * @param array $rules
     * @return bool
     */
    public function validate($input = [], $rules = []);

    /**
     * @param array $input
     * @param array $rules
     */
    public function getValidator($input, $rules);

    /**
     * @param array $rules
     */
    public function setRules($rules = []);

    /**
     * @return array
     */
    public function getRules();

    /**
     * @param array $errors
     */
    public function setErrors($errors = []);

    /**
     * @return array
     */
    public function getErrors();
}