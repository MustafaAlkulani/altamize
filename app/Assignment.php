<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //


    public function studyCourse()
    {
        return $this->belongsTo('App\StudyCourse');
    }



    public function solutionAssignments()
    {
        return $this->hasMany('App\SolutionAssignment');
    }


}
