<?php namespace App\Models;

class Comment extends BaseModel {
	use DateTrait;

	protected $fillable = ['user_id','post_id','content'];

	public function user(){
		return $this->belongsTo('App\Models\User');
	}
	public function post(){
		return $this->belongsTo('App\Models\Post');
	}
	public function scopeContent($query, $content){
		if( !$content ){
			return $query;
		}
		return $query->whereRaw(" content like '%$content%' ");
	}

	public function scopeUserId($query,$user_id){
		if( !$user_id ){
			return $query;
		}
		return $query->whereUserId($user_id);
	}

	public function scopePostId($query,$post_id){
		if( !$post_id ){
			return $query;
		}
		return $query->whereUserId($post_id);
	}
	public function scopeSort($query, $sort = 'asc'){
		if( in_array($sort,['asc','desc']) ){
			return $query->orderBy('content',$sort);
		}
		return $query;
	}

}
