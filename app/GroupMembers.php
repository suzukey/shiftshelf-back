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
        'position_id',//権限id
    ];
    public function Users(){
        return $this->belongsTo('App\Users');//外部キー(ユーザーid)
    }
    public function Groups(){
        return $this->belongsTo('App\Groups');//外部キー(グループid)
    }
    public function PositionAuthorities(){
        return $this->belongsTo('App\Authorities');//外部キー(権限id)
    }
}