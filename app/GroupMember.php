<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $table='group_members';
    protected $fillable = [
        'isAdmin', 'isBlocked','id','group_id','user_id',
    ];//

    public function users()
    {
        return $this->belongsTo('App\UserAccount','user_id','id');
    }
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
