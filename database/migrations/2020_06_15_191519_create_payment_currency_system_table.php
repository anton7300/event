<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCurrencySystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_currency_system', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('payment_system_id')->unsigned();
            $table->foreign('payment_system_id')->references('id')->on('payment_systems')->onDelete('cascade');

            $table->bigInteger('payment_currency_id')->unsigned();
            $table->foreign('payment_currency_id')->references('id')->on('payment_currencies')->onDelete('cascade');

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
        Schema::dropIfExists('payment_currency_system');
    }
}
