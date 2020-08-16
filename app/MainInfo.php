<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainInfo extends Model
{
    protected $table='maininfo';
    protected $fillable = [
   'slug','name','value','type',
    ];

    protected $hidden = [

    ];
}
