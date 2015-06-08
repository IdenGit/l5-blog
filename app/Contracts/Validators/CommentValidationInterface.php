<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 05.06.15
 * Time: 16:27
 */

namespace App\Contracts\Validators;


use App\Contracts\Services\ValidationInterface;

/**
 * Class CommentValidationInterface
 * @package App\Contracts\Validators
 */
interface CommentValidationInterface extends ValidationInterface
{
    /**
     * @return array
     */
    public function getUpdateRules();


}