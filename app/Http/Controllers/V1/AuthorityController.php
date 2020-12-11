<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Authorities;//権限
class AuthorityController extends Controller
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
        $Authority = new \App\Authorities;//権限
        $Authority -> name = $request -> name;//役職名
        $Authority -> recruitmentTarget = $request -> recruitmentTarget;//対象
        $Authority -> group = $request -> group;//グループ情報の管理
        $Authority -> member = $request -> member;//参加者の管理
        $Authority -> authority = $request -> authority;//役割の管理
        $Authority -> edit = $request -> edit;//シフトの編集
        $Authority -> recruitment = $request -> recruitment;//シフト希望の募集
        $Authority -> view = $request -> view;//シフト希望の閲覧
        $Authority->save();//保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $Authority->toJSON()
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
        $Authority = Authorities::findOrFail($id);
        return json_encode($Authority,JSON_PRETTY_PRINT);
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
        $Authority = \App\Authorities::findOrFail($id);//権限id
        $Authority->fill( $request->all() )->save();//更新内容すべてを保存
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $Authority->toJSON()
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
        $Authority = \App\Authorities ::findOrFail($id);//権限id
        $Authority -> delete();//削除
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $Authority->toJSON()
            ],
            201 );
    }
}
