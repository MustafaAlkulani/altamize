<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'id', 'acadimy_id', 'type','ssn','phone','email','ginder','name','qualification','has_acount'
    ];

    public function useraccount()
    {

        return $this->morphOne('App\UserAccount','useraccountable');
    }

    ////////////////////

    public function user_account()
    {
        return $this->hasOne('App\UserAccount');
    }

    public function studyCourses()
    {
        return $this->hasMany('App\StudyCourse');
    }

    public function referenceBookes()
    {
        return $this->hasMany('App\ReferenceBook');
    }


}
