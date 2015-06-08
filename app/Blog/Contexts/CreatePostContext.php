<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 05.06.15
 * Time: 18:27
 */

namespace App\Blog\Contexts;


use App\Contracts\Repositories\PostRepositoryInterface;
use App\Contracts\Validators\PostValidationInterface;

/**
 * Class CreatePostContext
 * @package App\Blog\Contexts
 */
class CreatePostContext extends BaseContext {

    /**
     * @param PostRepositoryInterface $post
     * @param PostValidationInterface $validator
     * @param array $post_data
     */
    public function __construct(
        PostRepositoryInterface $post,
        PostValidationInterface $validator,
        $post_data
    ){
        parent::__construct(get_defined_vars());
    }
}