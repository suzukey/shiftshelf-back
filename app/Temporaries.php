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
        'is_holiday',//臨時休業
        'opening_hour',//臨時始業時間
        'closed_hour',//臨時終業時間
    ];
    public function Surveies(){
        return $this->belongsTo('App\Surveies');//外部キー(シフト募集id)
    }
}