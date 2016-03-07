<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_configs', function (Blueprint $table) {
            $table->increments('api_id');
            $table->unsignedInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->unsignedInteger('expiration')->default(5);;
	        $table->text('allowed_characters');
	        $table->unsignedTinyInteger('token_length')->default(5);
	        $table->text('message_content');
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
        Schema::drop('verification_configs');
    }
}
