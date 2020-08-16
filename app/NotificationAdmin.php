<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationAdmin extends Model
{
    protected $table='notificationAdmins';
    protected $fillable = [
        'title','notification','file','admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function users()
    {
        return $this->belongsToMany('App\UserAccount');
    }
}
