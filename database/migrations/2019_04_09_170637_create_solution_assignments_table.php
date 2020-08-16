<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_assignments', function (Blueprint $table) {
            $table->increments('id');

            $table->text('describtion')->nullable();
            $table->string('file');
            $table->string('originalName');

            $table->boolean('viewed')->default(false);
            $table->integer('assignment_id')->unsigned();
            $table->foreign('assignment_id')->references('id')->on('assignments');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');


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
        Schema::dropIfExists('solution_assignments');
    }
}
