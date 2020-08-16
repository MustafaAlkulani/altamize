<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBlocked extends Model
{
    //

    public function useraccount()
    {
        return $this->belongsTo('App\UserAccount');
    }
}
