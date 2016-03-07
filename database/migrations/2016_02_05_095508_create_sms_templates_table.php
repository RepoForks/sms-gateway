<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
	        $table->integer('sent_count');
	        $table->text('content');
	        $table->integer('maximum_characters')->default(160);
	        $table->string('sms_id');
	        $table->text('description');
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
        Schema::drop('sms_templates');
    }
}
