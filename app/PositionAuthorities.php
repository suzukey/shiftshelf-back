<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionAuthorities extends Model
{
    public $timestamps = false;
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    public function GroupMembers(){
        return $this->hasMany('\App\GroupMembers');
    }
    public function Authorities(){
        return $this->belongsTo('App\Authorities');
    }
    public function Positions(){
        return $this->belongsTo('App\Positions');
    }
}
