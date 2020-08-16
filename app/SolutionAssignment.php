<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionAssignment extends Model
{
    //


    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }




    public function student()
    {
        return $this->belongsTo('App\Student');
    }


}
