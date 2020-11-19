<?php
namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
//use App\Articles;
use App\Groups;
use App\Http\Controllers\Controller;

class ShareController extends Controller
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
        $surveyinfo = \App\Surveies::where('group_id', $id)->first();
        $surveyid = $surveyinfo -> id;
        $confirminfo = \App\Confirms::pluck('id',"date")
        ->where('recruited_id', $surveyid)
        ->where('date',">", Carbon::now()->startOfMonth())
        ->where('date',"<", Carbon::now()->endOfMonth())
        ->get();
        $confirmid = $confirminfo -> id;
        $confirmuserinfo = \App\ConfirmUser::while('user_id', $id)
        ->while('confirm_id', $confirmid);
        return json_encode(array($confirminfo,$confirmuserinfo),JSON_PRETTY_PRINT);
        //$names = \App\User::pluck('id');
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