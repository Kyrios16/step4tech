<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->references('id')->on('posts');
            $table->string('content');
            $table->string('photo');
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
        Schema::dropIfExists('feedbacks');
    }
}
