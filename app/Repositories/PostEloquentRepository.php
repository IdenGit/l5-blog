<?php namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Models\Post;

class PostEloquentRepository extends BaseEloquentRepository implements PostRepositoryInterface
{
    /**
     * @param \App\Models\Post $dp
     */
    public function __construct(Post $dp)
    {
        $this->dataProvider = $dp;
    }

    public function getUserId($id)
    {
        return $this->getItem($id)->user_id;
    }

    public function getCommentPost($id)
    {
        return "";
    }

}