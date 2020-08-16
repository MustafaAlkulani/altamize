<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $table='advertising';
    protected $fillable = [
        'id', 'text', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public $timestamps = false;
    protected $hidden = [

    ];
}
