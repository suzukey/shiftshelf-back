<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporaries', function (Blueprint $table) {
            $table->string('id', 10); // 臨時ID
            $table->string('recruited_id', 10); // シフト募集ID
            $table->date('date'); // 日付
            $table->boolean('is_holiday')->nullable(); // 臨時休業
            $table->time('opening_hour')->nullable(); // 臨時休業時間
            $table->time('closed_hour')->nullable(); // 臨時休業時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporaries');
    }
}
