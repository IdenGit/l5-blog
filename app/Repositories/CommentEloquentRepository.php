<?php namespace App\Repositories;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Models\Comment;

class CommentEloquentRepository extends BaseEloquentRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        $this->dataProvider = $comment;
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUserId($id)
    {
        return $this->getItem($id)->user_id;
    }

    /**
     * @param $user_id
     */
    public function getUserComments($user_id)
    {
        return $this->dataProvider->where('user_id', '=', $user_id)->get();
    }

    /**
     * @param $post_id
     * @return mixed
     */
    public function getPostComments($post_id)
    {
        return $this->dataProvider->where('post_id', '=', $post_id)->get();
    }

    public function getPost($id)
    {
        if (!$comment = $this->getItem($id)) {
            return null;
        }

        return $comment->post;
    }
}