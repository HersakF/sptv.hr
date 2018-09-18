<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'caption',
        'alt',
        'source',
        'path',
    ];
}
