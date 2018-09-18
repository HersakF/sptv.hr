<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'visibility',
    ];

    public function pages(){
        return $this->hasOne('App\Pages' , 'id', 'page_id');
    }

    public function galleries_fragments(){
        return $this->hasMany('App\GalleriesFragments' , 'gallery_id', 'id')->orderBy('hierarchy');
    }

    public function galleries_fragments_app(){
        return $this->hasMany('App\GalleriesFragments' , 'gallery_id', 'id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }
}
