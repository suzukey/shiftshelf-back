<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use finfo;
use App\Users;//ユーザー
use App\Groups;//グループ
use App\GroupMembers;//グループメンバー
class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//一覧
        $operater_user = $request -> user_id;//ユーザーid
        $operater_group = $request -> group_id;//グループid
        $groupmember = \App\GroupMembers ::where('group_id',$operater_group)
                                            ->where('user_id', $operater_user)->get('authority_id');//グループidとユーザーidが一致する権限idをグループメンバーから取り出す
        return json_encode($groupmember, JSON_PRETTY_PRINT);
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
    public function show(Request $request){}
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