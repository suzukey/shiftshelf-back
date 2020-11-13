<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  // マイグレーション実行時に呼び出される関数.
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',30); // ユーザー名
            $table->string('icon_url')->nullable(); // ユーザーアイコン
            $table->string('email',256); //メールアドレス
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // ロールバック時に呼び出される関数.
    {
        Schema::dropIfExists('users');
    }
}
?>