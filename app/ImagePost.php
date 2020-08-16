<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    //
    protected $fillable = [
        'id','post_id','image',
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
