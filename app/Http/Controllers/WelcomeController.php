<?php namespace App\Http\Controllers;

use App\Models\Post;
use App\Contracts\Repositories\PostRepositoryInterface;


class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	protected $scopes = [
		'title'=>'title',
		'userId'=>[
			'alias'=>'user'
		],
		'AtDate'=>[
			'alias'=>'date'
		],
		'today'=>'today',
		'sort'=>'sort'
	];

	public function __construct(PostRepositoryInterface $repo)
	{
		$this->repository = $repo;
		$this->repository->setScopes($this->scopes);
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts =  $this->repository->getAll();
		return view('post.public')->with('posts',$posts);
	}

}
