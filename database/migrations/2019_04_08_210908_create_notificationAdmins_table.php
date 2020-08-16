<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificationAdmins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('notification');
            $table->string('file')->nullable();
            $table->integer("admin_id")->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');



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
        Schema::dropIfExists('notificationAdmins');
    }
}
