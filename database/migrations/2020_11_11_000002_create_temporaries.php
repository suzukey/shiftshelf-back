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
        if (Schema::hasTable('temporaries')) {
            return;// テーブルが存在していればリターン
        }
        Schema::create('temporaries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recruited_id');//->length(10); // シフト募集ID
            $table->date('date'); // 日付
            $table->boolean('is_holiday')->default(false); // 臨時休業
            $table->time('opening_hour')->nullable(); // 臨時休業時間
            $table->time('closed_hour')->nullable(); // 臨時休業時間
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
        Schema::dropIfExists('temporaries');
    }
}
?>