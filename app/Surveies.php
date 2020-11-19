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
    public function Groups(){
        return $this->belongsTo('App\Groups');
    }
    public function Temporaries(){
        return $this->hasMany('\App\Temporaries');
    }
    public function Wishes(){
        return $this->hasMany('\App\Wishes');
    }
}
