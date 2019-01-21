<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('post_id')->nullable();
          $table->integer('user_id')->nullable();
          $table->text('comment');
          $table->boolean('approved');
          $table->foreign('post_id')
              ->references('id')->on('posts')
              ->onDelete('cascade');
          $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
