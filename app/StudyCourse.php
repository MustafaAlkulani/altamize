<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyCourse extends Model
{
    protected $fillable = [
        'id', 'year', 'study_plan_id','teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }

    public function study_plan()
    {
        return $this->belongsTo('App\Study_plan','study_plan_id','id');
    }



    public function group()
    {
        return $this->hasOne('App\Group','study_course_id','id');
    }

    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }

    public function referenceBooks()
    {
        return $this->hasMany('App\ReferenceBook');
    }

    public function result()
    {
        return $this->hasMany('App\Result','study_course_id','id');
    }





}
