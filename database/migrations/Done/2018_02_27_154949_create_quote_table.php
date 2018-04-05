<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('quote_id');
            $table->integer('price');
            $table->string('description');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id') ->references('service_id')->on('services');
            $table->unsignedInteger('partner_id');
            $table->foreign('partner_id') ->references('partner_id')->on('partners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
