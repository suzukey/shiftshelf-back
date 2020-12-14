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
        if (Schema::hasTable('confirm_users')) {
            return;// テーブルが存在していればリターン
        }
        Schema::create('confirm_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('confirm_id')->length(10); // 確定シフトID
            $table->unsignedInteger('user_id')->length(10); // ユーザーID
            $table->time('start_at')->nullable(); // 開始時刻
            $table->time('end_at')->nullable(); // 終了時刻
            $table->foreign('confirm_id') // 外部キー設定
            ->references('id')
            ->on('confirms')
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
        Schema::dropIfExists('confirm_users');
    }
}
?>