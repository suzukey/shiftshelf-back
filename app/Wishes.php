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
        'start_at',//開始時刻
        'end_at',//終了時刻
    ];
    public function Surveies(){
        return $this->belongsTo('App\Surveies');//外部キー(シフト希望id)
    }
    public function Users(){
        return $this->belongsTo('App\Users');//外部キー(ユーザーid)
    }
}