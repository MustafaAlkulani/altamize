<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->integer("study_plan_id")->unsigned();
            $table->foreign('study_plan_id')->references('id')->on('study_plans');
            $table->integer("teacher_id")->unsigned();
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
        Schema::dropIfExists('study_courses');
    }
}
