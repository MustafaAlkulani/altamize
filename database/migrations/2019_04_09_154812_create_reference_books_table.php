<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_books', function (Blueprint $table) {
            $table->increments('id');
            $table->text('describtion')->nullable();
            $table->string('file');
            $table->string('originalName');
            $table->integer("study_course_id")->unsigned();
            $table->foreign('study_course_id')->references('id')->on('study_courses');
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
        Schema::dropIfExists('reference_books');
    }
}
