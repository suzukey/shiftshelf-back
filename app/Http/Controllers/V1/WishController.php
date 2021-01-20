<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wishes;//シフト希望

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//一覧
        $wish_recruitedid = $request->$recruited_id;
        $wish_userid = $request->$user_id;
        $wish = \App\Wishes ::where('recruited_id',$wish_recruitedid)
                                            ->where('user_id', $wish_userid)->get(all());//シフト募集idとユーザーidが一致するものを取り出す

       return json_encode($wish, JSON_PRETTY_PRINT);
    }E
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
        $wish = new \App\Wishes;//シフト募集
        $wish -> recruited_id = $request->recruited_id;//シフト募集ID
        $wish -> user_id = $request ->user_id;//ユーザーID
        $wish -> date = $request -> date;//日時
        $wish -> start_at = $request -> start_at;//開始時刻
        $wish -> end_at = $request -> end_at;//終了時刻
        $wish -> save();//保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $wish->toJSON()
            ],
            201 );
    }
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
    public function update(Request $request, $id)
    {//更新
        // findOrFail：モデルが見つからない時に、ModelNotFoundExceptionを投げる
        $wish = \App\Wishes::findOrFail($id);//シフト希望id
        $wish->fill( $request->all() )->save();//変更内容すべてを保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $wish->toJSON()
            ],
            201 );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
}
?>