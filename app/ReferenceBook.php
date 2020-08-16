<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenceBook extends Model
{
    //
    protected $fillable = [
        'id', 'describtion', 'file',
    ];
    public function studyCourse()
    {
        return $this->belongsTo('App\StudyCourse');
    }
}
