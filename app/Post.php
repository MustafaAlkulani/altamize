<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\UserAccount','user_id');
    }

    public function images()
    {
        return $this->hasMany('App\ImagePost','post_id');
    }


    public function users_liked()
    {
        return $this->belongsToMany('App\UserAccount', 'like_posts', 'post_id', 'user_id')->withPivot('type');
    }



    public function userComments()
    {
        return $this->belongsToMany('App\UserAccount', 'coumment_posts', 'post_id', 'user_id')->withPivot('text','image','created_at','id');

        //   return $this->belongsToMany('App\UserAccount');
    }

}
