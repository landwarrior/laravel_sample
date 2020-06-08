<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * CREATE TABLE failed_jobs (
     *   id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
     *   connection text COLLATE utf8mb4_unicode_ci NOT NULL,
     *   queue text COLLATE utf8mb4_unicode_ci NOT NULL,
     *   payload longtext COLLATE utf8mb4_unicode_ci NOT NULL,
     *   exception longtext COLLATE utf8mb4_unicode_ci NOT NULL,
     *   failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     *   PRIMARY KEY (id)
     * );
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
