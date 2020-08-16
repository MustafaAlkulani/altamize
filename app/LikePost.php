<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{

    protected $fillable = [
        'id','type','post_id','user_id',
    ];
    //



}
