<?php
namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Controllers\Controller;

class HomeSideMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //新規作成
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //詳細
        $userinfo = \App\Users::find($id);
        $userid = $userinfo -> id;
        $username = $userinfo -> username ;
        $usericon = $userinfo -> icon_url ;

        $usergroup = \App\Users::with(['GroupMember' => function($q){
            $q->where('user_id', '=', '$userid');
        }])->get();
        $groupinfo = \App\GroupMembers::with(['Group' => function($q2){
            $q2->where('group_id','=','$userid');
        }])->get();

        $arrayGrouSide = array($username , $usericon , $groupinfo);
        return json_encode($arrayGrouSide,JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //更新
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //削除
    }
}
