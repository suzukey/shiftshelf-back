<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_holiday','opening_hour','closed_hour',
    ];
}
