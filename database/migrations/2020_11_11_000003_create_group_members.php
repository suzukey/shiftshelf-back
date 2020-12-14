<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateGroupMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('group_members')) {
            return; // テーブルが存在していればリターン
        }
        Schema::create('group_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->length(10); // ユーザーID
            $table->unsignedInteger('group_id')->length(10); // グループID
            $table->unsignedInteger('authority_id')->length(10); // 役職ID
            $table->foreign('user_id') // 外部キー設定
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('group_id') // 外部キー設定
            ->references('id')
            ->on('groups')
            ->onDelete('cascade');
            $table->foreign('authority_id') // 外部キー設定
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
        Schema::dropIfExists('group_members');
    }
}
?>