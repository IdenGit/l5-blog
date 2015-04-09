<?php namespace App\Contracts\Repositories;
interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getUserId($id);

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUserComments($user_id);

    /**
     * @param $post_id
     * @return mixed
     */
    public function getPostComments($post_id);
}