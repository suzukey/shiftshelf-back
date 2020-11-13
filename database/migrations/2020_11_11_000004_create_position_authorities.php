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
        Schema::create('position_authorities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position_id', 10); // 役職ID
            $table->string('authority_id', 10); // 権限ID

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
