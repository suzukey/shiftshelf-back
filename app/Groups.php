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
        'groupname',//グループ名
        'icon_url',//グループアイコン
        'regular_opening_hour',//始業時間
        'regular_closed_hour',//終業時間
        'regular_holiday',//定休日
       ];
    public function GroupMembers(){
        return $this->hasMany('\App\GroupMembers');//グループメンバー
    }
    public function Surveies(){
        return $this->hasMany('\App\Surveies');//シフト募集
    }
}