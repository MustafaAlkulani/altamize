<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyCoumment extends Model
{
    //



    public function user()
    {
        return $this->belongsTo('App\UserAccount','user_id','id');
    }




}
