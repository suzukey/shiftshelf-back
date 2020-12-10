<?php

namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
use App\GroupMembers;
use App\Groups;
use App\Http\Controllers\Controller;
class GroupMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //一覧
        // 役職IDの昇順に並び替える
        $group_id = $request -> group_id;
        $groupmember = new \App\GroupMembers();
        $groupmember = $groupmember->where('group_id','=',$group_id)->orderBy('authority_id', 'asc')->get();
        return json_encode($groupmember, JSON_PRETTY_PRINT);
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
        $makegroupmember = new \App\GroupMembers();
        $makegroupmember -> user_id = $request -> user_id;
        $makegroupmember -> group_id = $request -> group_id;
        $makegroupmember -> authority_id = $request -> authority_id;
        $makegroupmember -> save();


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
    public function show()
    {

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
    //     return new JsonResponse(
    //         [
    //             'success' => "OK",
    //             "data" => $obj->toJSON()
    //         ],
    //         201 );
    //   }

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
        $groupmember = \App\GroupMembers::find($id);
        $groupmember->delete();
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $groupmember->toJSON()
            ],
            201 );
    }
}
