<?php
namespace App\Http\Controllers\V1;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Temporaries;
use App\GroupMembers;
// 希望調査
class WishSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧
        $wishsurveylist = \App\Surveies::orderBy('deadline','desc')->get();
        return json_encode($wishsurveylist,JSON_PRETTY_PRINT);
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
        // //新規作成
        $makesurvey = new \App\Surveies();
        $today = date("Y-m-d H:i:s");
        $makesurvey -> recruitmentstarted = $today;
        $makesurvey->fill( $request->all() )->save();
        // $makesurvey -> recruitname = $request->recruitname;
        // $makesurvey -> start_date = $request ->start_date;
        // $makesurvey -> end_date = $request->end_date;
        // $makesurvey -> group_id = $request->group_id;
        // $makesurvey -> deadline = $request ->deadline;
        // $makesurvey -> save();
        return new JsonResponse(
            [
                'success' => "OK",
                "data" => $makesurvey->toJSON()
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
        // 一般 シフト希望調査詳細
        // 臨時営業時間の場合は臨時の内容、そうでない場合は通常の営業時間等を返す。
        $temporary = Temporaries::find($id);
        if($temporary->is_holiday == true){
            $openning_hour=$temporary->opening_hour;
            $closed_hour = $temporary->closed_hour;

        }
        else{
            // 通常営業の開始、終了時刻返す
            $regular = \App\Groups::get();
            $openning_hour=$regular->regular_opening_hour;
            $closed_hour=$regular->regular_closed_hour;
        }
        return json_encode(array($openning_hour,$closed_hour),JSON_PRETTY_PRINT);
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
        $userconfirm = new \App\Confirms();
        $userconfirm -> recruitname = $request->status;
        $userconfirm -> save();
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
