<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position_id',
    ];

    public function Users(){
        return $this->belongsTo('App\Users');
    }
    public function Groups(){
        return $this->belongsTo('App\Groups');
    }
    public function PositionAuthorities(){
        return $this->belongsTo('App\Authorities');
    }
}
