<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_user', function (Blueprint $table) {
            $table->String('id', 10); // 確定シフトユーザーID
            $table->String('confirm_id', 10); // 確定シフトID
            $table->String('user_id', 10); // ユーザーID
            $table->time('start_at')->nullable(); // 開始時刻
            $table->time('end_at')->nullable(); // 終了時刻
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm_user');
    }
}
