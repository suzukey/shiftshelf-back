<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_user', function (Blueprint $table) {
            $table->String('id', 10); // シフト希望ユーザーID
            $table->String('wish_id', 10); // シフト希望ID
            $table->String('user_id', 10); // ユーザーID
            $table->time('start_id'); // 開始時刻
            $table->time('end_at'); // 終了時刻
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_user');
    }
}
