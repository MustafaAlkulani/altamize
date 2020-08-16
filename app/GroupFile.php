<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupFile extends Model
{
    //

    public function studyCourse()
    {
        return $this->belongsTo('App\Group');
    }

    public function user()
    {
        return $this->belongsTo('App\UserAccount','user_id','id');

    }
}
