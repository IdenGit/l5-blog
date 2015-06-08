<?php namespace App\Http\Controllers\Post;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Validators\CommentValidationInterface;

use Illuminate\Http\Request;
use \Auth;
use Illuminate\Support\Facades\Route;
use \Input;
use \View;
use \Redirect;

/**
 * Class CommentsController
 * @package App\Http\Controllers\Post
 */
class CommentsController extends Controller
{
    /**
     * @var CommentRepositoryInterface
     */
    protected $repository;

    /**
     * @param CommentRepositoryInterface $repo
     */
    public function __construct(CommentRepositoryInterface $repo)
    {
        $this->middleware('auth');
        $this->repository = $repo;
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
    public function store(Request $request, CommentValidationInterface $validator)
    {

        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        if (!$validator->validate($data)) {
            return Redirect::back()->withErrors($validator->getErrors())->withInput();
        }

        $this->repository->create($data);
        return Redirect::route('comments.show_created_message');
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
     * @param \App\Contracts\Repositories\PostRepositoryInterface $repoPost
     * @param  int $id
     * @return \App\Http\Controllers\Post\Response
     */
    public function edit(PostRepositoryInterface $repoPost, $id)
    {
        $comment = $this->repository->getItem($id);

        $post = $repoPost->getAll();

        return view('comment.edit')->with(['comment' => $comment, 'postArray' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, CommentValidationInterface $validator, $id)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;

        if (!$validator->validate($data, $validator->getUpdateRules())) {
            return Redirect::back()->withErrors($validator->getErrors())->withInput();
        }

        $this->repository->update($id, $data);
        return $this->show($id);
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


    /**
     * @return View
     */
    public function show_created_message()
    {
        return view('comment.created');
    }
}
