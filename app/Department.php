<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    protected $fillable = [
       'name','vision','message','fees','levels','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function study_plans()
    {
        return $this->hasMany('App\Study_plan');
    }

    public function upgrade()
    {
        return $this->hasMany('App\Upgrade');
    }
    protected $hidden = [
    ];
}
