<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDownloadActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_download_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('file_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('file_download_activities');
    }
}
