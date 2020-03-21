<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('date');
            $table->string('location');
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->date('age')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->integer('count_users')->nullable();

            $table->bigInteger('interest_id')->unsigned()->nullable();
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('set null');

            $table->tinyInteger('type');
            $table->integer('like')->default(0);
            $table->tinyInteger('is_active');

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
}
