<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'host',
        'host_id',
        'standard_url',
        'embed_url',
        'hierarchy',
        'visibility',
    ];

    public function pages(){
        return $this->hasOne('App\Pages' , 'id', 'page_id');
    }
}
