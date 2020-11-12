<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_users', function (Blueprint $table) {
            $table->string('id', 10); // シフト希望ユーザーID
            $table->string('wish_id', 10); // シフト希望ID
            $table->string('user_id', 10); // ユーザーID
            $table->time('start_id')->nullable(); // 開始時刻
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
        Schema::dropIfExists('wish_users');
    }
}
