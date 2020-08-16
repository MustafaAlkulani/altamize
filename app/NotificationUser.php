<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationUser extends Model
{
    protected $table='notification_users';
    protected $fillable = [
        'id','notification_id','user_id'
    ];

public $timestamps=false;


}
