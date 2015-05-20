<?php namespace App\Repositories;

use App\Models\Post;
use tests\TestCase;
use \DB;

class PostEloquentRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function gets_all_records()
    {
        // start transaction
        DB::beginTransaction();

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

        // rollback
        DB::rollback();
    }

    /**
     * @test
     */
    public function modify_item(){
        // start transaction
        DB::beginTransaction();

        // Arrange
        $repository = new PostEloquentRepository(new Post);
        $user = $this->factory->create('user');
        $posts = [
            $this->factory->create('post', ['user_id' => $user->id]),
            $this->factory->create('post', ['user_id' => $user->id]),
            $this->factory->create('post', ['user_id' => $user->id]),
        ];


        // Act
        foreach( $posts as $post ){
            $attributes = $this->factory->attributesFor("post",['content','title']);
            $content = $attributes['content'];
            $title = $attributes['title'];
            $post->content = $content;
            $post->title = $title;
            $repository->update($post->id,['content'=>$content,'title'=>$title]);
        }
        $results = $repository->getAll();


        // Assert
        $this->assertSame(3, count($results));

        foreach ($results as $key => $result) {
            $expected = $posts[$key];
            $this->assertEquals($expected->content, $result->content);
            $this->assertEquals($expected->title, $result->title);
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

        $repository = new PostEloquentRepository(new Post);
        $post = $this->factory->create('post');

        $result = $repository->getItem($post->id);

        $this->assertEquals($post, $result);

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

        $repository = new PostEloquentRepository(new Post);
        $post = $this->factory->create('post');

        $repository->destroy($post->id);

        $this->assertSame(null, Post::find($post->id));

        // rollback
        DB::rollback();
    }
}