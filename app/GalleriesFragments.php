<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleriesFragments extends Model
{
    protected $fillable = [
        'gallery_id',
        'photo_id',
        'title',
        'subtitle',
        'hierarchy',
        'visibility',
    ];

    public function photos(){
        return $this->hasOne('App\Photos' , 'id', 'photo_id');
    }

    public function galleries_fragments(){
        return $this->hasOne('App\Galleries' , 'id', 'gallery_id')->orderBy('hierarchy');
    }

    public function galleries_fragments_app(){
        return $this->hasOne('App\Galleries' , 'id', 'gallery_id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }
}
