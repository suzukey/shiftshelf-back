<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary', function (Blueprint $table) {
            $table->String('id', 10); // 臨時ID
            $table->String('recruited_id', 10); // シフト募集ID
            $table->date('date'); // 日付
            $table->boolean('is_holiday'); // 臨時休業
            $table->time('opening_hour'); // 臨時休業時間
            $table->time('closed_hour'); // 臨時休業時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary');
    }
}
