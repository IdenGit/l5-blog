<?php namespace App\Http\Controllers\Post;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use Illuminate\Http\Request;
use \Auth;
use \Input;
use \View;
use \Redirect;

class CommentsController extends Controller
{
    protected $repository;

    public function __construct(CommentRepositoryInterface $repo, PostRepositoryInterface $repoPost)
    {
        $this->middleware('auth');
        $this->repository = $repo;
        $this->repositoryPost = $repoPost;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if ($user = Auth::getUser()) {
            $comments = $this->repository->getUserComments($user->id);
            return view('comment.index', ['comments' => $comments]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->user()) {
            $data = $request->all();
            $data['user_id'] = $request->user()->id;
            $this->repository->create($data);
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $comment = $this->repository->getItem($id);

        return view('comment.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $comment = $this->repository->getItem($id);

        $post = $this->repositoryPost->getAll();

        return view('comment.edit')->with(['comment' => $comment, 'postArray' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($id, ['post_id' => $request->get('post_id'), 'content' => $request->get('content')]);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
    }
}
