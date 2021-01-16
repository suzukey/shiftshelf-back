<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Confirms extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',//日付
        'status',//確定ステータス
    ];
    public function Surveies(){
        return $this->belongsTo('App\Surveies');//外部キー(シフト募集id)
    }
}