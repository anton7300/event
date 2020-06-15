<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->bigInteger('ticket_user_id')->unsigned();
            $table->foreign('ticket_user_id')->references('id')->on('ticket_user')->onDelete('cascade');

            $table->bigInteger('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('payment_currencies')->onDelete('cascade');

            $table->bigInteger('payment_system_id')->unsigned();
            $table->foreign('payment_system_id')->references('id')->on('payment_systems')->onDelete('cascade');

            $table->string('amount');
            $table->string('payment_token');
            $table->timestamp('payment_at');
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
