<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'address',
        'lat',
        'lng',
        'hierarchy',
        'visibility',
    ];

    public function pages(){
        return $this->hasOne('App\Pages' , 'id', 'page_id');
    }
}
