<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpgradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->integer('admin_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('level')->default(1);
            $table->enum('semester',[1,2])->default(1);
            $table->integer('stape')->default(1);
            $table->integer('status')->default(0);
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('upgrades');
    }
}
