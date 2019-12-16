<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'id' => 'string',
    ];
}
