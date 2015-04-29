<?php namespace App\Repositories;

use App\Models\Post;
use tests\TestCase;
use App\Repositories\PostEloquentRepository;

class PostEloquentRepositoryTest extends TestCase
{
    /***/
    public function gets_all_records()
    {
        // Arrange
        $repository = new PostEloquentRepository(new Post);
        $user = $this->factory->create('user');
        $posts = [
            $this->factory->create('post', ['user_id' => $user->id]),
            $this->factory->create('post', ['user_id' => $user->id]),
            $this->factory->create('post', ['user_id' => $user->id]),
        ];

        // Act
        $results = $repository->getAll();

        // Assert
        $this->assertSame(3, count($results));

        foreach ($results as $key => $result) {
            $expected = $posts[$key];
            $this->assertEquals($expected->title, $result->title);
        }
    }

    /**
     * @test
     */
    public function gets_item()
    {
        $repository = new PostEloquentRepository(new Post);
        $post = $this->factory->create('post');

        $result = $repository->getItem($post->id);

        $this->assertEquals($post, $result);
    }

    /***/
    public function destroys_item()
    {
        $repository = new PostEloquentRepository(new Post);
        $post = $this->factory->create('post');

        $repository->destroy($post->id);

        $this->assertSame(null, Post::find($post->id));
    }
}