<?php namespace App\Models;

use Illuminate\Database\Query\Builder;

class Post extends BaseModel {
	use DateTrait;

	protected $fillable=['title','content','user_id'];

	public function user(){
		return $this->belongsTo('\App\Models\User');
	}
	public function comments(){
		return $this->hasMany('\App\Models\Comment');
	}

	public function scopeTitle($query, $title){
		if( !$title ){
			return $query;
		}
		return $query->whereTitle($title);
	}

	public function scopeUserId($query,$user_id){
		if( !$user_id ){
			return $query;
		}
		return $query->whereUserId($user_id);
	}
	public function scopeSort($query, $sort = 'asc'){
		if( in_array($sort,['asc','desc']) ){
			return $query->orderBy('title',$sort);
		}
		return $query;
	}

}
