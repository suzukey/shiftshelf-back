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
        'start_at',//開始時刻
        'end_at',//終了時刻
    ];
    public function Users(){
        return $this->belongsTo('App\Users');//外部キー(ユーザーid)
    }
    public function Wishes(){
        return $this->belongsTo('App\Wishes');//外部キー(シフト希望id)
    }
}
