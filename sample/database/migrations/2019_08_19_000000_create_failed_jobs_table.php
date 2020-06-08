<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
