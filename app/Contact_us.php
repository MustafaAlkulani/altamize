<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_us extends Model
{
    protected $table='contact_us';
    protected $fillable = [
        'contact_name', 'email', 'subject','message','view',
    ];

}
