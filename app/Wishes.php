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
        'date',//日時
    ];
    public function Surveies(){
        return $this->belongsTo('App\Surveies');//外部キー(シフト希望id)
    }
    public function WishUsers(){
        return $this->hasMany('\App\WishUsers');//シフト希望ユーザー
    }
}