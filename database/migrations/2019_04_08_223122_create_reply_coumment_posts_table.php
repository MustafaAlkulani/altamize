<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyCoummentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('reply_coumments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text')->nullable();
            $table->string('image')->nullable();

            $table->integer("coumment_post_id")->unsigned();
            $table->foreign('coumment_post_id')->references('id')->on('coumment_posts');
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
        Schema::dropIfExists('reply_coumment_post_groups');
    }
}
