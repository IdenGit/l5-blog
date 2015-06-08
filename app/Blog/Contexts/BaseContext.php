<?php namespace App\Blog\Contexts;

use Deefour\Interactor\Context;
use Deefour\Interactor\Interactor;
use Deefour\Interactor\Status\Error;
use App\Exceptions\SystemError;
use App\Exceptions\ValidationFailed;

abstract class BaseContext extends Context
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Marks the state of the interactor as failed, setting a sensible message
     * to explain what went wrong.
     *
     * @param  string $message [optional]
     * @return Interactor
     */
    public function fail($message = null)
    {
        $status = new Error($this, $message);

        $this->setStatus($status);
    }

    /**
     * @param array $errors
     * @throws \App\Exceptions\ValidationFailed
     */
    public function failValidation($errors = [])
    {
        $this->setErrors($errors);
        $this->fail('Validation failed');

        $e = new ValidationFailed('Validation failed');
        $e->setContext($this);
        throw $e;
    }

    /**
     * @param null $message
     * @throws \App\Exceptions\SystemError
     */
    public function systemError($message = null)
    {
        $this->fail($message);
        $e = new SystemError($message);
        $e->setContext($this);
        throw $e;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return array_values($this->toArray());
    }
}