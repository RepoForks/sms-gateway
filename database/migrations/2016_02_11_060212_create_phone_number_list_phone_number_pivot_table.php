<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneNumberListPhoneNumberPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_number_pivot', function (Blueprint $table) {
            $table->integer('phone_number_list_id')->unsigned()->index();
            $table->foreign('phone_number_list_id')->references('id')->on('phone_number_lists')->onDelete('cascade');
            $table->integer('phone_number_id')->unsigned()->index();
            $table->foreign('phone_number_id')->references('id')->on('phone_numbers')->onDelete('cascade');
            $table->primary(['phone_number_list_id', 'phone_number_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phone_number_pivot');
    }
}
