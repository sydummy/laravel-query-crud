<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public $incrementing = false;
    /**
     * Boot the Model.
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($instance) {
            $instance->id = str_random(12);
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'owner',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];
}
