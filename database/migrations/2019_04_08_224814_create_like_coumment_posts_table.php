<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeCoummentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_coumment_posts', function (Blueprint $table) {
            $table->integer("coumment_post_id")->unsigned();
            $table->foreign('coumment_post_id')->references('id')->on('coumment_posts');
            $table->integer("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('user_accounts');
            $table->primary(['coumment_post_id','user_id']);
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
        Schema::dropIfExists('like_coumment_post_groups');
    }
}
