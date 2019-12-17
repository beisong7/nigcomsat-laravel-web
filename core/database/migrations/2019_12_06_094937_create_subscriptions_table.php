<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('unid')->nullable();
            $table->text('plan_key')->nullable();
            $table->text('client_key')->nullable();
            $table->text('payment_key')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('last')->nullable(); // set true if last to be added,
            $table->bigInteger('end_date')->nullable(); //
            $table->bigInteger('start_date')->nullable(); //
            $table->string('duration')->nullable();
            $table->string('duration_type')->nullable(); //days -1, weeks-2, months-3, years-4

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
        Schema::dropIfExists('subscriptions');
    }
}
