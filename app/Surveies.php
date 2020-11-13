<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveies extends Model
{
    public $timestamps = false;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recruitname', 'start_date','end_date','recruitmentstarted','deadline',
    ];
}
