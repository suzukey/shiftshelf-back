<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Users extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // レコード挿入を許可するカラムのこと↓
    protected $fillable = [
        'username',//ユーザー名
        'icon_url',//ユーザーアイコン
        'email'//メールアドレス
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function GroupMembers(){
        return $this->hasMany('\App\GroupMembers');//グループメンバー
    }
    public function WishUsers(){
        return $this->hasMany('\App\Wish');//シフト希望
    }
    public function ConfirmUsers(){
        return $this->hasMany('\App\ConfirmUsers');//確定シフトユーザー
    }
}
