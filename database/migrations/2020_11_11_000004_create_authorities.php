<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAuthorities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('position_authorities')) {
            return;// テーブルが存在していればリターン
        }
        Schema::create('authorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // 役職名
            $table->boolean('recruitmentTarget')->default(true);//シフト募集対象に含めるか
            $table->boolean('group')->default(false);//グループ情報の管理
            $table->boolean('member')->default(false);//参加者の管理
            $table->boolean('authority')->default(false);//役割の管理(権限)
            $table->boolean('edit')->default(false);//シフトの編集
            $table->boolean('recruitment')->default(false);//シフト希望の募集
            $table->boolean('view')->default(false);//シフト希望の閲覧
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_authorities');
    }
}
?>