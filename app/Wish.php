<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
    ];
}
