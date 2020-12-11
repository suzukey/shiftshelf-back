<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;//ユーザー
class HomeSideMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){}
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
    public function show($id)
    {//詳細
        $userinfo = \App\Users::find($id);//ユーザーid
        $userid = $userinfo -> id;//ユーザーid
        $username = $userinfo -> username ;//ユーザー名
        $usericon = $userinfo -> icon_url ;//ユーザーアイコン
        $usergroup = \App\GroupMembers::where('user_id', $id)->get();//ユーザーidが一致するものをグループメンバーから取り出す
        $arrayHomeSide = array($username , $usericon , $usergroup);
        return json_encode($arrayHomeSide,JSON_PRETTY_PRINT);
    }
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
