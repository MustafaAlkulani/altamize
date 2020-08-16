<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'id', 'personal_image', 'cover_image','about','user_name','display_name','password','useraccountable_type','last_Active','ginder','useraccountable_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


//    public function teacher()
//    {
//        return $this->belongsTo('App\Teacher');
//    }
//
//    public function student()
//    {
//        return $this->belongsTo('App\Student');
//    }

public function useraccountable()
{
    return $this->morphTo();
}





    public function userFlowings()
    {
        return $this->hasMany('App\UserFlowing');
    }


    public function userblockes()
    {
        return $this->hasMany('App\UserBlocked');
    }


    public function messages()
    {
        return $this->hasMany('App\Message');
    }






    public function posts()
    {
        return $this->hasMany('App\Post');
    }




    public function likeposts()
    {
        return $this->belongsToMany('App\Post', 'like_posts', 'user_id', 'post_id')->withPivot('type');


    }




    public function coummentPosts()
    {
        return $this->belongsToMany('App\CoummentPost');
    }







    public function likeCommentposts()
    {
        return $this->belongsToMany('App\CoummentPost');
    }

    public function ReplyCommentposts()
    {
        return $this->belongsToMany('App\CoummentPost');
    }



    public function personalImages()
    {
        return $this->hasMany('App\PersonalImage');
    }

}
