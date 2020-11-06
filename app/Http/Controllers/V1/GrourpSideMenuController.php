<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Confirm;
use App\Survey;
use App\GroupMember;
use App\Survey;
use App\PositionAuthority;]
use App\Authority;
use App\Http\Controllers\Controller;

class GroupSideMenuController extends Controller
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
        $userinfo = \App\User::find($id);
        $userid = $userinfo -> id;
        $username = $userinfo -> username ;
        $usericon = $userinfo -> icon_url ;

        $groupname = \Group::table('groupname')->get();
        
        $surveyid = \Survey::table('id')->get();
        $surveyname = \Survey::table('recruitname')->get();
        
        $confirmstatus = \Confirm::table('status')->get();

        $group_member_info = \App\Group_Member::find($userid);
        $positionid = $group_member_info -> position_id ;
        $position_authority_info = \App\PositionAuthority::find($positionid);
        $authority_id = $position_authority_info -> authority_id ;
        
        echo $username ,$usericon ,$groupname ,$surveyid ,$surveyname ,$confirmstatus ,$authority_id;
        
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
