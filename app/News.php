<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='news';
    protected $fillable = [
     'title','detail','type','state'
    ];

public function imageNews(){
    return $this->hasMany('App\ImageNew','new_id','id');
}
    protected $hidden = [

    ];
}
