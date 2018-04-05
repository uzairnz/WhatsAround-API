<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('partner_id');
            $table->string('password');
            $table->string('name');
            $table->string('cnic_number');
            $table->string('contact_number');
            $table->string('email');
            $table->string('occupation');
            $table->string('service_category');
            $table->integer('age');
            $table->string('location');
            $table->string('gender');
            //$table->string('picture');    *Need a solution for this
            $table->integer('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
