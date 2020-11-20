<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Users;
use \App\GroupMembers;
use \App\Comfirms;
use App\Http\Controllers\Controller;

class CalenderController extends Controller
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
        //get使います
        $groupmemberinfo = App\Users::where('user_id', $id)->get();
        $groupid = $groupmemberinfo -> group_id;
        $groupname = App\Group::select('name')->find($id);
        $surveyid = \App\Surveies::pluck('id')
        ->where('group_id', $groupid)
        ->where('start_date',">", $request -> date)
        ->where('end_date',"<", $request -> date)
        ->get();
        $confirminfo = \App\Confirms::pluck('id')
        ->where('recruited_id', $surveyid)
        ->where('status', false)
        ->get();
        $confirmid = $confirminfo -> id;
        $confirmuserinfo = \App\ConfirmUsers::while('user_id', $id)
        ->where('confirm_id', $confirmid);
        $confirmid_2 = $confirmuserinfo -> confirm_id;
        $confirmuser_start_at = $confirmuserinfo -> start_at;
        $confirmuser_end_at = $confirmuserinfo -> end_at;
        $confirmdate = \App\Confirms::pluck('date');
        $arraycalendar = array($groupname,$confirmdate,$confirmuser_start_at,$confirmuser_end_at);
        return json_encode($arraycalendar,JSON_PRETTY_PRINT);
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
    }
}
