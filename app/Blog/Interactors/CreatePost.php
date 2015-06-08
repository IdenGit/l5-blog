<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 08.06.15
 * Time: 13:27
 */

namespace App\Blog\Interactors;


use App\Blog\Contexts\CreatePostContext;

/**
 * Class CreatePost
 * @package App\Blog\Interactors
 */
class CreatePost extends BaseInteractor {

    /**
     * @var CreatePostContext
     */
    protected $context;

    /**
     * @param CreatePostContext $context
     */
    public function __construct(CreatePostContext $context){
        $this->context = $context;
    }

    public function call(){
        $context = $this->context();

        if( !$this->validate($context->validator,$context->post_data) ){
            $context->failValidation( $context->validator->getErrors() );
        }

        $context->post->create($context->post_data);

        return $context;
    }

}