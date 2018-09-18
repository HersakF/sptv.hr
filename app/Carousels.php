<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousels extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'visibility',
    ];

    public function pages(){
        return $this->hasOne('App\Pages' , 'id', 'page_id');
    }

    public function carousels_fragments(){
        return $this->hasMany('App\CarouselsFragments' , 'carousel_id', 'id')->orderBy('hierarchy');
    }

    public function carousels_fragments_app(){
        return $this->hasMany('App\CarouselsFragments' , 'carousel_id', 'id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }
}
