<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Surveies;//シフト募集
class WishShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//一覧
        $today = now();//現在時刻を取得
        $surveylist = \App\Surveies:: where('deadline','<',$today)->orderBy('deadline', 'asc')->get('recruitname');//募集締め切り日時を過ぎていないシフト募集を締め切り日時の昇順に取り出す
        return json_encode($surveylist,JSON_PRETTY_PRINT);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
}
