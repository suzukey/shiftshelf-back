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
        'recruitname',//希望調査名
        'start_date',//開始日
        'end_date',//終了日
        'recruitmentstarted',//募集開始日
        'deadline',//募集締め切り日
    ];
    public function Groups(){
        return $this->belongsTo('App\Groups');//外部キー(グループid)
    }
    public function Temporaries(){
        return $this->hasMany('\App\Temporaries');//臨時
    }
    public function Wishes(){
        return $this->hasMany('\App\Wishes');//シフト希望
    }
}