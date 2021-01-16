<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;//ユーザー
class UserController extends Controller
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
    { //新規作成
        $user = new \App\Users;//ユーザー
        $user -> username = $request->username;//ユーザー名
        $user -> icon_url = $request ->icon_url;//ユーザーアイコン
        $user -> email = $request -> email;//ユーザーメールアドレス
        $user -> save();//保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $user->toJSON()
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
        $user = \App\Users::findOrFail($id);//ユーザーid
        $user->fill( $request->all() )->save();//変更内容すべてを保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $user->toJSON()
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
        $user = \App\Users ::findOrFail($id);//ユーザーid
        $user -> delete();//削除
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $user->toJSON()
            ],
            201 );
    }
}
?>