<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    protected $fillable = [
        'id', 'department_id','admin_id','status','semester','level','year','stape'
    ];
    public function department()
    {
        return $this->belongsTo('App\Department','department_id','id');
    }
}
