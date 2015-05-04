<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property integer $id 
 * @property string $name 
 * @property string $email 
 * @property string $password 
 * @property string $remember_token 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property integer $id 
 * @property integer $user_id 
 * @property integer $post_id 
 * @property string $content 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \App\Models\User $user 
 * @property-read \App\Models\Post $post 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment wherePostId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Comment whereUpdatedAt($value)
 */
	class Comment {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property integer $id 
 * @property integer $user_id 
 * @property string $title 
 * @property string $content 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \App\Models\User $user 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments 
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post whereUpdatedAt($value)
 */
	class Post {}
}

