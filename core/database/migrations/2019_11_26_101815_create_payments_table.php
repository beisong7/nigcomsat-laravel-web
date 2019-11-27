<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_key')->nullable();
            $table->string('unid')->nullable();
            $table->string('plan_key')->nullable();
            $table->bigInteger('time')->nullable();
            $table->text('reason')->nullable();
            $table->boolean('success')->nullable(); //true or false
            $table->string('amount')->nullable(); //
            $table->string('duration')->nullable(); //
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
        Schema::dropIfExists('payments');
    }
}
