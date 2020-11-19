<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisheUsers extends Model
{
    public $timestamps = false;
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_at','end_at',
    ];

    public function Users(){
        return $this->belongsTo('App\Users');
    }
    public function Wishes(){
        return $this->belongsTo('App\Wishes');
    }
}
