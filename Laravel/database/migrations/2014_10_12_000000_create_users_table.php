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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_img');
            $table->string('cover_img');
            $table->string('github')->nullable();;
            $table->string('linkedin')->nullable();;
            $table->string('bio');
            $table->date('date_of_birth');
            $table->string('ph_no')->nullable();
            $table->string('position');
            $table->string('role');
            $table->foreignId('created_user_id')->references('id')->on('users');
            $table->foreignId('updated_user_id')->references('id')->on('users');
            $table->foreignId('deleted_user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes('deleted_at');
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
