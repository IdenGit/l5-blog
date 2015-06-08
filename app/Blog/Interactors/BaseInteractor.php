<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 05.06.15
 * Time: 18:11
 */

namespace App\Blog\Interactors;


use Deefour\Interactor\Interactor;

abstract class BaseInteractor extends Interactor
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