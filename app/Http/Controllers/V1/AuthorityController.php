<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
use App\Articles;
use App\Authorities;
use App\Http\Controllers\Controller;

class AuthorityController extends Controller
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
        $Authority = new \App\Authorities;
        $Authority -> name = $request -> name;
        $Authority -> recruitmentTarget = $request -> recruitmentTarget;
        $Authority -> group = $request -> group;
        $Authority -> member = $request -> member;
        $Authority -> authority = $request -> authority;
        $Authority -> edit = $request -> edit;
        $Authority -> recruitment = $request -> recruitment;
        $Authority -> view = $request -> view;
        $Authority->save();
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
    {
        //詳細
        $Authority = Authorities::findOrFail($id);
        return json_encode($Authority,JSON_PRETTY_PRINT);
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
        $Authority = \App\Authorities::findOrFail($id);
        $Authority -> position_id = $request ->position_id;
        $Authority -> authority_id = $request ->authority_id;
        $Authority ->save();
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
    {
        //削除
        $Authority = \App\Authorities ::findOrFail($id);
        $Authority -> delete();
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $Authority->toJSON()
            ],
            201 );
    }
}
