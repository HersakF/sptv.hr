<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $fillable = [
        'photo_id',
        'title',
        'url',
        'hierarchy',
        'visibility',
    ];

    public function photos(){
        return $this->hasOne('App\Photos' , 'id', 'photo_id');
    }
}
