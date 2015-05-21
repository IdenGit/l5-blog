<?php namespace App\Validators;

use App\Contracts\Services\ValidationInterface;
use Illuminate\Support\Facades\Validator;

abstract class BaseValidator implements ValidationInterface
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param array $input
     * @param array $rules
     * @return bool
     */
    public function validate($input = [], $rules = [])
    {
        $rules = $rules ? $rules : $this->getRules();

        $validator = $this->getValidator($input, $rules);

        $result = $validator->passes();

        if (!$result) {
            $this->setErrors($validator->messages()->toArray());
        }

        return $result;
    }

    /**
     * @param array $input
     * @param array $rules
     */
    public function getValidator($input, $rules)
    {
        return Validator::make($input, $rules);
    }

    /**
     * @param array $rules
     * @return void
     */
    public function setRules($rules = [])
    {
        $this->rules = $rules;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param array $errors
     */
    public function setErrors($errors = [])
    {
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}