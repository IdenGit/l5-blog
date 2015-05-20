<?php
namespace App\Repositories;

use App\Models\Post;
use \DB;
use App\Models\Comment;

use tests\TestCase;

class CommentEloquentRepositoryTest extends TestCase
{

    /**
     * @test
     */
    public function get_all_items()
    {
        // start transaction
        DB::beginTransaction();

        // Arrange
        $repository = new CommentEloquentRepository(new Comment);

        $user = $this->factory->create('user');
        $post = $this->factory->create('post', ['user_id' => $user->id]);

        $comments = [
            $this->factory->create('comment', ['user_id' => $user->id, 'post_id' => $post->id]),
            $this->factory->create('comment', ['user_id' => $user->id, 'post_id' => $post->id]),
            $this->factory->create('comment', ['user_id' => $user->id, 'post_id' => $post->id]),
        ];

        // Act
        $results = $repository->getAll();

        // Assert
        $this->assertSame(3, count($results));

        foreach ($results as $key => $result) {
            $expected = $comments[$key];
            $this->assertEquals($expected->content, $result->content);
        }

        // rollback
        DB::rollback();
    }

    /**
     * @test
     */
    public function modify_item()
    {
        // start transaction
        DB::beginTransaction();

        // Arrange
        $repository = new CommentEloquentRepository(new Comment);

        $user = $this->factory->create('user');
        $post = $this->factory->create('post', ['user_id' => $user->id]);

        $comments = [
            $this->factory->create('comment', ['user_id' => $user->id, 'post_id' => $post->id]),
            $this->factory->create('comment', ['user_id' => $user->id, 'post_id' => $post->id]),
            $this->factory->create('comment', ['user_id' => $user->id, 'post_id' => $post->id]),
        ];

        // Act
        foreach ($comments as $comment) {
            $attributes = $this->factory->attributesFor("comment", ['content']);
            $content = $attributes['content'];
            $comment->content = $content;
            $repository->update($comment->id, ['content' => $content]);
        }

        $results = $repository->getAll();

        // Assert
        $this->assertSame(3, count($results));

        foreach ($results as $key => $result) {
            $expected = $comments[$key];
            $this->assertEquals($expected->content, $result->content);
        }

        // rollback
        DB::rollback();
    }

    /**
     * @test
     */
    public function gets_item()
    {
        // start transaction
        DB::beginTransaction();

        // Arrange
        $repository = new CommentEloquentRepository(new Comment);

        $comment = $this->factory->create('comment');

        $result = $repository->getItem($comment->id);

        $this->assertEquals($comment, $result);

        // rollback
        DB::rollback();
    }

    /**
     * @test
     */
    public function destroys_item()
    {
        // start transaction
        DB::beginTransaction();

        $repository = new CommentEloquentRepository(new Comment);
        $comment = $this->factory->create('comment');

        $repository->destroy($comment->id);

        $this->assertSame(null, Comment::find($comment->id));

        // rollback
        DB::rollback();
    }

}