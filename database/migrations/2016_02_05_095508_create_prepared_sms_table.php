<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparedSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prepared_sms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
	        $table->integer('sent_count');
	        $table->integer('text');
	        $table->integer('maximum_characters')->default(160);
	        $table->string('sms_id');
	        $table->softDeletes();
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
        Schema::drop('prepared_sms');
    }
}
