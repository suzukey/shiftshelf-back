<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionAuthorities extends Migration
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
        Schema::create('position_authorities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('position_id')->length(10); // 役職ID
            $table->unsignedInteger('authority_id')->length(10); // 権限ID

            $table->foreign('position_id')
            ->references('id')
            ->on('positions')
            ->onDelete('cascade');

            $table->foreign('authority_id')
            ->references('id')
            ->on('authorities')
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
        Schema::dropIfExists('position_authorities');
    }
}
