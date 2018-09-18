<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'path',
        'hierarchy',
        'visibility',
    ];

    public function pages(){
        return $this->hasOne('App\Pages' , 'id', 'page_id');
    }
}
