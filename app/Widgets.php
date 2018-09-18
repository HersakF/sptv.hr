<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widgets extends Model
{
    protected $fillable = [
        'title',
        'hierarchy',
        'visibility',
    ];
}
