<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Surveies;//シフト募集
class MakeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//一覧　募集締め切りを過ぎたシフト一覧
        $group_id = $request -> group_id;//グループidを取得
        $surveies = new \App\Surveies();//シフト募集
        $now = Carbon::now()->toDateString();//現在時刻を取得
        $surveies = $surveies->where('group_id','=',$group_id)->where('deadline', '<=' ,$now)->get();// グループidが一致しかつ募集締め切りを過ぎているもの
        $surveieslist = \App\Surveies::orderBy('id','asc')->get();//シフト募集idの昇順
        return json_encode($surveieslist,JSON_PRETTY_PRINT);
    }
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
        $makeshift = new \App\Confirms();
        $makeshift -> recruited_id = $request->recruited_id;//シフト募集ID
        $makeshift -> date = $request->date;//日付
        // $makeshift -> status = true;
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
    {//削除
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
// シフト作成 0106
// 募集idを選択した後、日付の一覧を表示するならもうひとつコントローラーを作らないといけない？
// DBに日付をまとめて格納したい → 新規作成のタイミング