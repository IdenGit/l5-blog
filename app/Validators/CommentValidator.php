<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 05.06.15
 * Time: 16:31
 */

namespace App\Validators;


use App\Contracts\Validators\CommentValidationInterface;

class CommentValidator extends BaseValidator implements CommentValidationInterface {

    protected $rules = [
        'content'=>['required'],
    ];

    protected $updateRules = [
        'content'=>['required'],
        'user_id'=>['required','exists:users,id'],
        'post_id'=>['required','exists:posts,id']
    ];

    public function getUpdateRules(){
        return $this->updateRules;
    }

}