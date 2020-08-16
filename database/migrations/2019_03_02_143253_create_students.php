<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('acadimy_id')->unique();
            $table->integer('department_id')->unsigned();
            $table->string('phone');
            $table->string('level')->default('1');
            $table->integer('status')->default(0);
            $table->string('email')->nullable() ;
            $table->string('ssn')->unique();
            $table->boolean('has_acount')->default(false);
            $table->enum('ginder',['male','female']);
            $table->foreign('department_id')->references('id')->on('departments');
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
        Schema::dropIfExists('students');
    }
}
