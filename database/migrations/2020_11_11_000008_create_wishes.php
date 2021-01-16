<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateWishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('wishes')) {
            return;// テーブルが存在していればリターン
        }
        Schema::create('wishes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruited_id')->length(10); // シフト募集ID
            $table->date('date'); // 日付
            $table->foreign('recruited_id') // 外部キー設定
            ->references('id')
            ->on('surveies')
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
        Schema::dropIfExists('wishes');
    }
}
?>