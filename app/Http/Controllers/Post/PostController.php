<?php namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use \View;
use \Redirect;
use Illuminate\Http\Request;
use \Auth;

class PostController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $posts =  Post::all();
        return View::make('post.index')->with('posts',$posts);
    }

    public function create(){
        return View::make('post.create');
    }

    public function store(Request $request){
        $post = new Post($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        return View::make('post.created');
    }

    public function show(Request $request,$id){
        $post = Post::find($id);
        return view('post.show',['post'=>$post]);
    }

    public function edit(Request $request,$id){
        $post = Post::find($id);
        if(Auth::getUser()->id !== $post->user->id){
            return Redirect::back();
        }
        return View::make('post.edit')->with('post', $post);
    }

    public function update(Request $request,$id){
        $post =  Post::find($id);
        if(Auth::getUser()->id !== $post->user->id){
            return Redirect::back();
        }
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();
        return $this->show($request,$id);
    }

    public function destroy(Request $request,$id){
        $post = Post::find($id);
        if(Auth::getUser()->id !== $post->user->id){
            return false;
        }
        $post = Post::find($id);
        $post->delete();
    }

}