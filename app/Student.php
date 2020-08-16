<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'id', 'acadimy_id', 'department_id','ssn','phone','email','ginder','name','has_acount','level'
    ];

    ////////////
    public function useraccount()
    {

        return $this->morphOne('App\UserAccount','useraccountable');
    }
    /// ////////////

    public function department()
    {
        return $this->belongsTo('App\Department');
    }


    public function user_account()
    {
        return $this->hasOne('App\UserAccount');
    }

    public function solutionAssignments()
    {
        return $this->hasMany('App\SolutionAssignment');
    }

}
