<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("messageFrom_id")->unsigned();
            $table->integer("messageTo_id")->unsigned();
            $table->text("message")->nullable() ;
            $table->string("image")->nullable() ;

            $table->boolean("viewed");
            $table->integer("delete")->default(0);
            $table->integer("recived")->default(0);



            $table->foreign('messageFrom_id')->references('id')->on('user_accounts');
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
        Schema::dropIfExists('messages');
    }
}
