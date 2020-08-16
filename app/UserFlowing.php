<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFlowing extends Model
{
    //

    public function useraccount()
    {
        return $this->belongsTo('App\UserAccount');
    }
}
