<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('describtion')->nullable();
            $table->string('file');
            $table->string('originalName');
            $table->integer("group_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('group_files');
    }
}
