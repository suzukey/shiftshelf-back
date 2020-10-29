<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recruitname', 'start_date','end_date','recruitmentstarted','deadline',
    ];
}