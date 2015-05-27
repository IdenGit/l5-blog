<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 21.05.15
 * Time: 18:40
 */

namespace App\Contracts\Validators;


use App\Contracts\Services\ValidationInterface;

interface CommentValidationInterface extends ValidationInterface {
    /**
     * @return array
     */
    public function getUpdateRules();
}