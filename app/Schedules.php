<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'description',
        'date',
        'time',
        'linked_page_url',
        'visibility',
    ];

    public function pages(){
        return $this->hasOne('App\Pages' , 'id', 'page_id');
    }
}