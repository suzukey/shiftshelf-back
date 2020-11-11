<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->String('id',10); // グループID
            $table->String('groupname',60); // グループ名
            $table->String('icon_url')->nullable(); // グループアイコン
            $table->time('regular_opening_hour')->nullable(); // 始業時間
            $table->time('regular_closed_hour')->nullable(); // 就業時間
            $table->binary('regular_holiday', 8)->nullable(); // 定休日
        });
    }                                 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
