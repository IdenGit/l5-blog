<?php namespace App\UseCases;

use Deefour\Interactor\Interactor;

abstract class BaseUseCase extends Interactor
{
    /**
     * Getter for the context object bound to the interactor
     *
     * @return \App\Contexts\BaseContext
     */
    public function context()
    {
        return $this->context;
    }

    /**
     * @param \App\Contracts\Services\ValidationInterface $validator
     * @param array                                       $data
     * @param array                                       $rules
     * @return bool
     */
    protected function validate($validator, $data, $rules = [])
    {
        $rules = $rules ?: $validator->getRules();

        return $validator->validate($data, $rules);
    }
}