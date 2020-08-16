<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('acadimy_id')->unique();
            $table->string('qualification');
            $table->string('phone');
            $table->string('email')->nullable() ;
            $table->string('ssn')->unique();
            $table->boolean('has_acount')->default(false);
            $table->enum('ginder',['male','female']);
            $table->enum('type',['doctor','teacher']);
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
        Schema::dropIfExists('teachers');
    }
}
