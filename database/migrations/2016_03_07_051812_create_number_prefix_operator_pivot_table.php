<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberPrefixOperatorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_prefix_operator', function (Blueprint $table) {
            $table->integer('number_prefix_id')->unsigned()->index();
            $table->foreign('number_prefix_id')->references('id')->on('number_prefixes')->onDelete('cascade');
            $table->integer('operator_id')->unsigned()->index();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->primary(['number_prefix_id', 'operator_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('number_prefix_operator');
    }
}
