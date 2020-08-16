<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoummentPost extends Model
{

    public function user()
    {
        return $this->belongsTo('App\UserAccount','user_id','id');
    }

    public function users_liked()
    {
        return $this->belongsToMany('App\UserAccount', 'like_coumment_posts', 'coumment_post_id', 'user_id')->withPivot('type');
    }




    public function replyUserComments()
    {
        return $this->belongsToMany('App\UserAccount');
    }

    public function replayComments()
    {
        return $this->hasMany('App\ReplyCoumment','coumment_post_id');
    }

    public function userComments()
    {
        return $this->belongsToMany('App\UserAccount', 'reply_coumments', 'coumment_post_id', 'user_id')->withPivot('text','image','created_at','id');

        //   return $this->belongsToMany('App\UserAccount');
    }

}
