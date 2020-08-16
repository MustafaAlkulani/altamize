<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    protected $fillable = [
        'id', 'study_plan_id', 'study_course_id','grade','year','rate','student_id',
    ];


    public function study_course()
    {
        return $this->hasOne('App\StudyCourse','id','study_course_id');
    }
    public function student()
    {
        return $this->hasOne('App\Student','id','student_id');
    }


}
