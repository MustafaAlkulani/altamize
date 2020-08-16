<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoummentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coumment_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text')->nullable();
            $table->string('image')->nullable();

            $table->integer("post_id")->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('user_accounts');
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
        Schema::dropIfExists('coumment_post_groups');
    }
}
