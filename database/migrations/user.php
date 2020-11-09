<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  // マイグレーション実行時に呼び出される関数.
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('id', 10); // ユーザーID
            $table->string("username", 30); // ユーザー名
            $table->string("icon_url"); // ユーザーアイコン
            $table->string("email", 256)->nullable(); //メールアドレス
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // ロールバック時に呼び出される関数.
    {
        Schema::dropIfExists('user');
    }
}
?>