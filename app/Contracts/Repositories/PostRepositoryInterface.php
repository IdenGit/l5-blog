<?php namespace App\Contracts\Repositories;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getUserId($id);


    /**
     * @param $id
     * @return mixed
     */
    public function getCommentPost($id);
}