<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
use App\Articles;
use App\Confirms;
use App\Http\Controllers\Controller;

class MakeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧
        $shiftlist = \App\Confirms::orderBy('date','asc')->get();
        return json_encode($shiftlist,JSON_PRETTY_PRINT);
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
// 未完
        //新規作成
        $makeshift = new \App\Confirms();
        $makeshift -> recruited_id = $request->recruited_id;//<- シフト募集IDを取る
        $makeshift -> date = $request->date;
        $makeshift -> save();
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $makeshift->toJSON()
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
    {
        //詳細
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
        $updateshift = \App\Confirms::findOrFail($id);
        $updateshift -> recruited_id = $request -> recruited_id;
        $updateshift -> date = $request->date;
        $updateshift ->save();
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $updateshift->toJSON()
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
    {
        //削除
        $deleteshift = \App\Confirms ::findOrFail($id);
        $deleteshift -> delete();
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $deleteshift->toJSON()
            ],
            201 );
    }
}