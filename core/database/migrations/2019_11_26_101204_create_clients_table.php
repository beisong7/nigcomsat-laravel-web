<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unid')->nullable();
            $table->string('names')->nullable();
            $table->string('email')->unique()->nullable();
            $table->boolean('email_valid')->nullable();
            $table->boolean('phone_valid')->nullable();
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('username')->nullable();
            $table->string('address')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('terms')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('seen_last')->nullable();
            $table->bigInteger('countdown_pass')->nullable();
            $table->string('reset_toke')->nullable();
            $table->string('creator_key')->nullable(); //creator key
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
