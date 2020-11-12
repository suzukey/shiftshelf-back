<?php
namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Articles;
use App\PositionAuthorities;
use App\Http\Controllers\Controller;

class PositionAuthorityController extends Controller
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
        $PositionAuthority = new \app\PositionAuthorities;
        $PositionAuthority->position_id = $request->position_id;
        $PositionAuthority->authority_id = $request->authority_id;
        $PositionAuthority->save();

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
        $PositionAuthority = PositionAuthorities::findOrFail($id);
        return json_encode($PositionAuthority,JSON_PRETTY_PRINT);
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
        $PositionAuthority = \App\PositionAuthorities::findOrFail($id);
        $PositionAuthority -> position_id = $request ->position_id;
        $PositionAuthority -> authority_id = $request ->authority_id;
        $PositionAuthority ->save();
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
        $PositionAuthority = \App\PositionAuthorities ::findOrFail($id);
        $PositionAuthority -> delete();
    }
}
