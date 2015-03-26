<?php namespace App\Http\Controllers\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use Illuminate\Http\Request;
use \Auth;
use \Input;
use \View;
use \Redirect;

class CommentsController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::getUser();
		if($user){
			$comments =  Comment::where('user_id','=',$user->id)->get();
			return view('comment.index',['comments'=>$comments]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('comment.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = Auth::getUser();
		if($user){
			Comment::create([
				'user_id'=>$user->id,
				'post_id'=>Input::get('post_id'),
				'content'=>Input::get('content')
			]);
		}
		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = Comment::find($id);
		return view('comment.show',['comment'=>$comment]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::find($id);
		$comment->load('post');
		return View::make('comment.edit')->with('comment',$comment);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$comment = Comment::find($id);
		$comment->post_id = Input::get('post_id');
		$comment->content = Input::get('content');
		$comment->save();
		return $this->index();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::find($id);
		$comment->delete();
	}

}
