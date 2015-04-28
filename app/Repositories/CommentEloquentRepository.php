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
     * @param integer $id
     * @return mixed
     */
    public function getUserId($id)
    {
        return $this->getItem($id)->user_id;
    }

    /**
     * @param integer $user_id
     * @return mixed
     */
    public function getUserComments($user_id){
        return $this->applyScopes($this->dataProvider, $this->scopes)->where('user_id', '=', $user_id)->get();
    }

    /**
     * @param integer $post_id
     * @return mixed
     */
    public function getPostComments($post_id){
        $this->applyScopes($this->dataProvider, $this->scopes)->where('post_id', '=', $post_id)->get();
    }
}