<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Groups;//グループ
class GroupController extends Controller
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
    public function store(Request $request)
    {//新規作成
        $group = new Groups;//グループ
        $group->groupname = $request->groupname;//グループ名
        $group->icon_url = $request->icon_url;//グループアイコン
        $group->regular_opening_hour = $request->regular_closed_hour;//始業時間
        $group->regular_closed_hour = $request->regular_closed_hour;//終業時間
        $group->regular_holiday = $request->regular_holiday;//定休日
        $group->save();//保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $group->toJSON()
            ],
            201 );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {//詳細
        // findOrFail：モデルが見つからない時に、ModelNotFoundExceptionを投げる
        $group = Groups::findOrFail($id);//グループid
        return json_encode($group,JSON_PRETTY_PRINT);
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
    public function update(Request $request, $id)
    {//更新
        // findOrFail：モデルが見つからない時に、ModelNotFoundExceptionを投げる
        $group = Groups::findOrFail($id);//グループid
        $group->fill( $request->all() )->save();//更新内容すべてを保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $group->toJSON()
            ],
            201 );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {//削除
        // findOrFail：モデルが見つからない時に、ModelNotFoundExceptionを投げる
        $group = \App\Groups ::findOrFail($id);//グループid
        $group -> delete();//削除
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $group->toJSON()
            ],
            201 );
    }
}
?>