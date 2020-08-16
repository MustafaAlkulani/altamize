<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalImage extends Model
{
    //

    //
    protected $fillable = [
        'id','post_id','image','type'
    ];
    public function user()
    {
        return $this->belongsTo('App\UserAccount','user_id');
    }



}
