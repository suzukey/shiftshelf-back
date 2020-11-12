<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionAuthority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_authority', function (Blueprint $table) {
            $table->string('id', 10); // 役職権限ID
            $table->string('position_id', 10); // 役職ID
            $table->string('authority_id', 10); // 権限ID
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_authority');
    }
}
