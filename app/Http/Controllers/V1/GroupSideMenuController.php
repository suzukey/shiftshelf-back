<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\Request;
use App\Users;//ユーザー
use App\Groups;//グループ
use App\GroupMembers;//グループメンバー
use App\Http\Controllers\Controller;
class GroupSideMenuController extends Controller
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
    public function show(Request $request)
    {//詳細
        $operater_user = $request -> user_id;//ユーザーid
        $operater_group = $request -> group_id;//グループid
        $userinfo = \App\Users::find($operater_user);
        $username = $userinfo -> username ;//ユーザー名
        $usericon = $userinfo -> icon_url ;//ユーザーアイコン
        $groupname = \App\Groups ::where('id',$operater_group)->get('groupname');//グループ名
        $authority = \App\GroupMembers ::where('group_id',$operater_group)
                                            ->where('user_id', $operater_user)->get('authority_id');//グループidとユーザーidが一致する権限idをグループメンバーから取り出す
        $arrayGroupSide = array($username,$usericon,$groupname,$authority);
        return json_encode($arrayGroupSide,JSON_PRETTY_PRINT);
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
?>