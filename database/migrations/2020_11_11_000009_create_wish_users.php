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
        if (Schema::hasTable('wish_users')) {
            return;// テーブルが存在していればリターン
        }
        Schema::create('wish_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('wish_id')->length(10);// シフト希望ID
            $table->unsignedInteger('user_id')->length(10); // ユーザーID
            $table->time('start_at')->nullable(); // 開始時刻
            $table->time('end_at')->nullable(); // 終了時刻
            $table->foreign('wish_id') // 外部キー設定
                  ->references('id')
                  ->on('wishes')
                  ->onDelete('cascade');
            $table->foreign('user_id') // 外部キー設定
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
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
?>