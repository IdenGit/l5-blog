<?php namespace App\Contracts\Repositories;
interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUserId($user_id);
}