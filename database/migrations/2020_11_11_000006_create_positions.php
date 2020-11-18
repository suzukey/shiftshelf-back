<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('positions')) {
            // テーブルが存在していればリターン
            return;
        }
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // 役職名
            $table->integer('sequence'); // 順序
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
