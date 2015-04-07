<?php namespace App\Http\Controllers\Post;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Post;
use View;
use Redirect;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{

    protected $repository;

    public function __construct(PostRepositoryInterface $repo)
    {
        $this->middleware('auth');
        $this->repository = $repo;
    }

    public function index()
    {
        $posts = $this->repository->getAll();

        return View::make('post.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->user_id = $request->user()->id;
        $post->save();

        return Redirect::route('posts.show_created_message');
    }

    public function show_created_message()
    {
        return view('post.created');
    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        return view('post.show', ['post' => $post]);
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::getUser()->id !== $post->user->id) {
            return Redirect::back();
        }

        return view('post.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::getUser()->id !== $post->user->id) {
            return Redirect::back();
        }
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return $this->show($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::getUser()->id !== $post->user->id) {
            return false;
        }
        $post->delete();
    }
}