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
            // テーブルが存在していればリターン
            return;
        }
        Schema::create('authorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // 役職名
            // $table->integer('sequence'); // 順序
            $table->boolean('recruitmentTarget');//シフト募集対象に含めるか
            $table->boolean('group');//グループ情報の管理
            $table->boolean('member');//参加者の管理
            $table->boolean('authority');//役割の管理(権限)
            $table->boolean('edit');//シフトの編集
            $table->boolean('recruitment');//シフト希望の募集
            $table->boolean('view');//シフト希望の閲覧
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
