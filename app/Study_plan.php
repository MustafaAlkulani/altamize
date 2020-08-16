<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study_plan extends Model
{
    protected $fillable = [
        'id', 'name_ar','name_en', 'department_id','semester','level','theorical_hore','lab_hore','max_grade',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function studyCourses()
    {
        return $this->hasMany('App\StudyCourse');
    }

}

