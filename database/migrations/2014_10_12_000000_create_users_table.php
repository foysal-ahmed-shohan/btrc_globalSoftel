<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('is_admin')->default(0)->nullable();
            $table->string('email')->unique();
            $table->string('time')->nullable();
            $table->string('date')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('original_password');
            $table->integer('status');
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
