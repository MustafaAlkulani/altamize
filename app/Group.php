<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
 //
    protected $fillable = [
        'id', 'cover_image', 'description','name', 'study_course_id'
    ];

    public function studyCourse()
    {
        return $this->belongsTo('App\StudyCourse','study_course_id','id');
    }

    public function userAccounts()
    {
        return $this->belongsToMany('App\UserAccount', 'group_members', 'group_id', 'user_id')->withPivot('isAdmin','id','isBlocked');

    }

    public function postGroups()
    {
        return $this->hasMany('App\PostGroup');
    }

    public function groupFiles()
    {
        return $this->hasMany('App\GroupFile');
    }

    public function groupMember()
    {
        return $this->hasMany('App\GroupMember');
    }

    public function users()
    {
        return $this->belongsToMany('App\UserAccount');
    }
}
