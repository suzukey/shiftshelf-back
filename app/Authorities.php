<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Authorities extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',//役職名
        'recruitmentTarget',//対象
        'group',//グループ情報の管理
        'member',//参加者の管理
        'authority',//役割の管理
        'edit',//シフトの編集
        'recruitment',//シフト希望の募集
        'view'//シフト希望の閲覧
    ];
    public function GroupMembers(){
        return $this->hasMany('\App\GroupMembers');//グループメンバー
    }
}