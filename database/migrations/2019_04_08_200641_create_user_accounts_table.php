<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('personal_image')->default('social/users/personal.jpg');
            $table->string('cover_image')->default('social/users/cover.jpg');
            $table->string('password') ;
            $table->string('user_name')->unique();
            $table->string('display_name');
            $table->text('about')->nullable() ;
            $table->string('address')->nullable() ;
            $table->string('site')->nullable() ;
            $table->timestamp('last_Active');

            $table->integer("useraccountable_id")->unsigned();
            $table->boolean('completeRigester')->default(false);
            $table->boolean('follow_my')->default(true);
            $table->boolean('message_my')->default(false);
            $table->boolean('view_my')->default(true);

            $table->boolean('Ifollow')->default(true);
            $table->boolean('Myfollow')->default(true);

            $table->string('useraccountable_type');

//            $table->integer("member_id")->unsigned();
//            $table->foreign('member_id')->references('id')->on('teachers')->references('id')->on('students');
            $table->rememberToken();

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
        Schema::dropIfExists('user_accounts');
    }
}
