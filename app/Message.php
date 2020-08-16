<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //


    protected $fillable = [
        'id', 'messageFrom_id', 'messageTo_id','message','image','delete','viewed','recived' ];

    public function useraccount()
    {
        return $this->belongsTo('App\UserAccount');
    }
}
