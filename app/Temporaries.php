<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporaries extends Model
{
    public $timestamps = false;
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_holiday','opening_hour','closed_hour',
    ];
    public function Surveies(){
        return $this->belongsTo('App\Surveies');
    }
}