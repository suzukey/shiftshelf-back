<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
    ];
}
