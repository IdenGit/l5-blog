<?php namespace App\Exceptions;

use App\Contexts\BaseContext;

abstract class BaseContextException extends \Exception
{
    /**
     * @var \App\Contexts\BaseContext $context
     */
    protected $context;

    /**
     * @param \App\Contexts\BaseContext $context
     */
    public function setContext(BaseContext $context)
    {
        $this->context = $context;
    }

    /**
     * @return \App\Contexts\BaseContext
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        $errors = [];

        if ($c = $this->getContext()) {
            $errors = $c->getErrors();
        }

        return $errors;
    }
}