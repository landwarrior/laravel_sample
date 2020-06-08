<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_user', function (Blueprint $table) {
            $table->string('user_cd', 16);
            $table->string('name', 128);
            $table->string('name_kana', 128)->nullable();
            $table->string('password');
            $table->integer('is_admin')->default(0);
            $table->rememberToken();
            $table->string('remarks', 256)->nullable();
            $table->integer('bp_id')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();

            $table->primary('user_cd');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_bin';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_user');
    }
}
