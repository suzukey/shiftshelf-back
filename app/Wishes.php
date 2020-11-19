<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishes extends Model
{
    public $timestamps = false;
                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
    ];
    public function Surveies(){
        return $this->belongsTo('App\Surveies');
    }
    public function WishUsers(){
        return $this->hasMany('\App\WishUsers');
    }
}