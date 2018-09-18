<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselsFragments extends Model
{
    protected $fillable = [
        'carousel_id',
        'photo_id',
        'title',
        'subtitle',
        'url',
        'hierarchy',
        'visibility',
    ];

    public function photos(){
        return $this->hasOne('App\Photos' , 'id', 'photo_id');
    }

    public function carousels_fragments(){
        return $this->hasOne('App\Carousels' , 'id', 'carousel_id')->orderBy('hierarchy');
    }

    public function carousels_fragments_app(){
        return $this->hasOne('App\Carousels' , 'id', 'carousel_id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }
}
