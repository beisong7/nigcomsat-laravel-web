<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unid')->nullable();
            $table->string('name')->nullable();
            $table->text('info')->nullable(); // details of plan separated by underscore "_"
            $table->string('type')->nullable();
            $table->string('cost')->nullable(); // price in words
            $table->bigInteger('price')->nullable(); // price in value
            $table->bigInteger('duration')->nullable(); //unix time of duration
            $table->string('duration_info')->nullable(); // info on duration e.g duration length in words, price
            $table->boolean('active')->nullable();
            $table->boolean('default')->nullable(); //default plan on registration
            $table->string('creator_key')->nullable(); //creator key
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
        Schema::dropIfExists('plans');
    }
}
