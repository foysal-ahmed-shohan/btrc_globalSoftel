<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('file_modified_name')->nullable();
            $table->string('file_original_name')->nullable();
            $table->string('note')->nullable();
            $table->string('original_date')->nullable();
            $table->string('original_time')->nullable();
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
        Schema::dropIfExists('files');
    }
}
