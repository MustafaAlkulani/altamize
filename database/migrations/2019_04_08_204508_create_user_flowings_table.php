<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFlowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_flowings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("member1_id")->unsigned();
            $table->integer("member2_id")->unsigned();
            $table->boolean('request')->default(false);
            $table->foreign('member1_id')->references('id')->on('user_accounts');
            $table->foreign('member2_id')->references('id')->on('user_accounts');
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
        Schema::dropIfExists('user_flowings');
    }
}
