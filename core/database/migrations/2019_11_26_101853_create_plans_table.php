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
            $table->string('type')->nullable();
            $table->string('cost')->nullable();
            $table->string('duration')->nullable();
            $table->string('duration_type')->nullable(); //days -1, weeks-2, months-3, years-4
            $table->boolean('active')->nullable(); //days -1, weeks-2, months-3, years-4
            $table->string('creator_key')->nullable(); //creator key
            $table->bigInteger('end_date')->nullable(); //
            $table->bigInteger('start_date')->nullable(); //
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
