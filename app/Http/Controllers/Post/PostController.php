<?php namespace App\Http\Controllers\Post;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Contracts\Validators\PostValidationInterface;
use Illuminate\Support\Facades\Validator;
use View;
use Redirect;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{

    protected $repository;

    protected $scopes = [
        'title'
    ];

    public function __construct(PostRepositoryInterface $repo, CommentRepositoryInterface $repoComment)
    {
        $this->middleware('auth');
        $this->repository = $repo;
        $this->repositoryComment = $repoComment;
    }

    public function index()
    {
        $posts = $this->repository->getAll($this->scopes);

        return view('post.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(CreatePostRequest $request, PostValidationInterface $validator)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;

        if (!$validator->validate($data)) {
            return Redirect::back()->withErrors($validator->getErrors())->withInput();
        }

        $this->repository->create($data);

        return Redirect::route('posts.show_created_message');
    }

    public function show_created_message()
    {
        return view('post.created');
    }

    public function show(Request $request, $id)
    {
        $post = $this->repository->getItem($id);

        $comments = $this->repositoryComment->getPostComments($id);

        return view('post.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Request $request, $id)
    {
        $post = $this->repository->getItem($id);
        if ($request->user()->id !== $this->repository->getUserId($id)) {
            return Redirect::back();
        }

        return view('post.edit')->with('post', $post);
    }

    public function update(Request $request, PostValidationInterface $validator, $id)
    {
        if ($request->user()->id !== $this->repository->getUserId($id)) {
            return Redirect::back();
        }

        $data = $request->all();
        $data['user_id'] = $request->user()->id;

        if (!$validator->validate($data, $validator->getUpdateRules())) {
            return Redirect::back()->withErrors($validator->getErrors())->withInput();
        }

        $this->repository->update($id, ['title' => $request->get('title'), 'content' => $request->get('content')]);

        return $this->show($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        if (Auth::getUser()->id !== $this->repository->getUserId($id)) {
            return false;
        }
        $this->repository->destroy($id);
    }
}