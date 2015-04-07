<?php namespace App\Repositories;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Models\Comment;

class CommentEloquentRepository extends BaseEloquentRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        $this->dataProvider = $comment;
    }

    public function getByUserId($user_id)
    {
        return $this->dataProvider->where('user_id', '=', $user_id)->get();
    }
}