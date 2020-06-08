<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         *
         * CREATE TABLE books (
         *   id int(10) unsigned NOT NULL AUTO_INCREMENT,
         *   name varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
         *   price int(11) NOT NULL,
         *   author varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
         *   created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
         *   updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
         *   PRIMARY KEY (id)
         * );
         *
         */
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name', 50);
            $table->integer('price');
            $table->string('author', 50)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
