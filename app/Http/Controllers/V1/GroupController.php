<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
use App\Groups;
use App\Http\Controllers\Controller;

class GroupController extends Controller
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
        $group = new Groups;
        $group->groupname = $request->groupname;
        $group->icon_url = $request->icon_url;
        $group->regular_opening_hour = $request->regular_closed_hour;
        $group->regular_closed_hour = $request->regular_closed_hour;
        $group->regular_holiday = $request->regular_holiday;
        $group->save();
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
    {
        //詳細
        $group = Groups::findOrFail($id);
        return json_encode($group,JSON_PRETTY_PRINT);
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
        $group = Groups::findOrFail($id);
        $group->fill( $request->all() )->save();
        // $group -> groupname = $request ->groupname;
        // $group -> icon_url = $request ->icon_url;
        // $group -> regular_opening_hour = $request ->regular_opening_hour;
        // $group -> regular_closed_hour = $request ->regular_closed_hour;
        // $group -> regular_holiday = $request ->regular_holiday;
        // $group ->save();
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
    {
        //削除
        $group = \App\Groups ::findOrFail($id);
        $group -> delete();
    }
}
