<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('confirm_id', 10); // 確定シフトID
            $table->string('user_id', 10); // ユーザーID
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
        Schema::dropIfExists('confirm_users');
    }
}
