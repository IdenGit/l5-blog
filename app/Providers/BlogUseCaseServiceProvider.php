<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 08.06.15
 * Time: 13:32
 */

namespace App\Providers;

use App\Blog\Contexts\CreatePostContext;
use App\Blog\Interactors\CreatePost;
use App\Models\Post;
use App\Repositories\PostEloquentRepository;
use App\Validators\PostValidator;


class BlogUseCaseServiceProvider extends BaseServiceProvider
{

    public function register()
    {
        // Post - CreatePost
        $this->app->bind('CreatePost', function ($app, $params) {
            return new CreatePost(new CreatePostContext(
                new PostEloquentRepository(new Post),
                new PostValidator,
                $params
            ));
        });
    }

}