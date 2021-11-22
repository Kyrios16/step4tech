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
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('profile_img', 255);
            $table->string('cover_img', 255);
            $table->string('github', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('bio', 255)->nullable();
            $table->date('date_of_birth');
            $table->string('ph_no', 255)->nullable();
            $table->string('position', 255);
            $table->string('role', 255);
            $table->foreignId('created_user_id')->references('id')->on('users');
            $table->foreignId('updated_user_id')->references('id')->on('users');
            $table->foreignId('deleted_user_id')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->rememberToken();
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
