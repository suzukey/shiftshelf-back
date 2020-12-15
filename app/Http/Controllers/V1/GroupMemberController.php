<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GroupMembers;//グループメンバー
use App\Groups;//グループ
class GroupMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//一覧
        $group_id = $request -> group_id;//グループidを取得
        $groupmember = new \App\GroupMembers();//グループメンバー
        $groupmember = $groupmember->where('group_id','=',$group_id)->orderBy('authority_id', 'asc')->get();// グループidが一致したものを取り出し、役職IDの昇順に並び替える
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
    public function store(Request $request)
    { //新規作成
        $makegroupmember = new \App\GroupMembers();//グループメンバー
        $makegroupmember -> user_id = $request -> user_id;//ユーザーID
        $makegroupmember -> group_id = $request -> group_id;//グループID
        $makegroupmember -> authority_id = $request -> authority_id;//権限ID
        $makegroupmember -> save();//保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $makegroupmember->toJSON()
            ],
            201 );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){}
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
    public function update(Request $request,$id){}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {//削除
        // findOrFail：モデルが見つからない時に、ModelNotFoundExceptionを投げる
        $groupmember = \App\GroupMembers::findOrFail($id);//グループメンバーid
        $groupmember->delete();//削除
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $groupmember->toJSON()
            ],
            201 );
    }
}
?>