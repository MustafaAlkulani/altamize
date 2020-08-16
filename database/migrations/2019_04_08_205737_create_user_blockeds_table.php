<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBlockedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_blockeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("member1_id")->unsigned();
            $table->integer("member2_id")->unsigned();
            $table->foreign('member1_id')->references('id')->on('user_accounts');
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
        Schema::dropIfExists('user_blockeds');
    }
}
