<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 21.05.15
 * Time: 18:42
 */

namespace App\Validators;


use App\Contracts\Validators\CommentValidationInterface;

class CommentValidator extends BaseValidator implements CommentValidationInterface {
    /**
     * @var array
     */
    protected $rules = [
        'content' => ['required', 'min:20']
    ];

    /**
     * @var array
     */
    protected $updateRules = [
        'user_id' => ['required', 'exists:users,id'],
        'post_id' => ['required', 'exists:posts,id'],
        'content' => ['required', 'min:20']
    ];

    /**
     * @return array
     */
    public function getUpdateRules()
    {
        return $this->updateRules;
    }
}