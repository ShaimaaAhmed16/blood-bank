<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id');
    protected $appends = ['is_favourite'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function client_posts()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function getIsFavouriteAttribute(){
        $user = auth('api')->user();
        if (!$user)
        {
            $user = auth('client-web')->user();
        }
        if ($user)
        {
            $favourite = Post::whereHas('client_posts',function ($q) use($user){
                $q->where('client_post.client_id',$user->id);
                $q->where('client_post.post_id',$this->id);
            })->first();
            if ($favourite)
                return true;
        }
        return false;
    }

}