<?php namespace App\Validators;

use App\Contracts\Validators\PostValidationInterface;

class PostValidator extends BaseValidator implements PostValidationInterface
{
    /**
     * @var array
     */
    protected $rules = [
        'title' => ['required'],
        'content' => ['required']
    ];

    /**
     * @var array
     */
    protected $updateRules = [
        'user_id' => ['required', 'exists:users,id'],
        'title' => ['required', 'min:10'],
        'content' => ['required']
    ];

    /**
     * @return array
     */
    public function getUpdateRules()
    {
        return $this->updateRules;
    }
}