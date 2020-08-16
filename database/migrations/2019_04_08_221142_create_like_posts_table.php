<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_posts', function (Blueprint $table) {
            $table->integer("post_id")->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('user_accounts');
            $table->primary(['post_id','user_id']);
            $table->enum('type',['like','dislike']);
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
        Schema::dropIfExists('like_post_groups');
    }
}
