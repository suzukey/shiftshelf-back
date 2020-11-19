<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'groupname', 'icon_url','regular_opening_hour','regular_closed_hour','regular_holiday',   ];

    public function GroupMembers(){
        return $this->hasMany('\App\GroupMembers');
    }
    public function Surveies(){
        return $this->hasMany('\App\Surveies');
    }
}
