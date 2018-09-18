<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'page_id',
        'type',
        'category',
        'navigation',
        'title',
        'subtitle',
        'content',
        'abstract',
        'author',
        'url',
        'hierarchy',
        'sortability',
        'visibility',
        'multiplicity',
        'removability',
        'seo_keywords',
        'seo_description',
        'released_at',
        'emitted_at',
    ];

    public function carousels()
    {
        return $this->hasMany('App\Carousels', 'page_id', 'id');
    }

    public function carousels_app()
    {
        return $this->hasMany('App\Carousels', 'page_id', 'id')->where('visibility', '=', '1');
    }

    public function galleries()
    {
        return $this->hasMany('App\Galleries', 'page_id', 'id');
    }

    public function galleries_app()
    {
        return $this->hasMany('App\Galleries', 'page_id', 'id')->where('visibility', '=', '1');
    }

    public function videos()
    {
        return $this->hasMany('App\Videos', 'page_id', 'id')->orderBy('hierarchy');
    }

    public function videos_app()
    {
        return $this->hasMany('App\Videos', 'page_id', 'id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }

    public function files()
    {
        return $this->hasMany('App\Videos', 'page_id', 'id')->orderBy('hierarchy');
    }

    public function files_app()
    {
        return $this->hasMany('App\Files', 'page_id', 'id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }

    public function locations()
    {
        return $this->hasMany('App\Locations', 'page_id', 'id')->orderBy('hierarchy');
    }

    public function locations_app()
    {
        return $this->hasMany('App\Locations', 'page_id', 'id')->where('visibility', '=', '1')->orderBy('hierarchy');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedules', 'page_id', 'id')->whereDate('date', '>=', Carbon::today()->toDateString())->orderBy('id');
    }

    public function schedules_app()
    {
        return $this->hasMany('App\Schedules', 'page_id', 'id')->where('visibility', '=', '1')->orderBy('id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Pages', 'page_id');
    }

    public function getAbsolutePath() {
        if($this->parent) {
            return $this->parent->getAbsolutePath(). "/" . $this->url;
        } else {
            return $this->url;
        }
    }
}
