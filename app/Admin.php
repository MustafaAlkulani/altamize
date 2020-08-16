<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    //
 protected $table='admins';
    protected $fillable = [
        'name', 'email', 'password','username','phone','image','is_admin','is_sit','is_social','is_control','is_un'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notifications()
    {
        return $this->hasMany('App\NotificationAdmin');
    }

}
