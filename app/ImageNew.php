<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageNew extends Model
{
    protected $table='imagenews';
    protected $fillable = [
        'new_id','path'

    ];

    protected $hidden = [

    ];
}
