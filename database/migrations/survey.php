<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->String('id', 10); // シフト募集ID
            $table->String('recruitname', 10); // 希望調査名
            $table->date('start_date'); // 開始日
            $table->date('end_date'); //　終了日
            $table->date('recruitmentstarted'); // 募集開始日
            $table->datetime('deadline'); // 募集締め切り日
            $table->String('group_id', 10); // グループID
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
}
