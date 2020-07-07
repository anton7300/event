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

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('interest_id')->unsigned()->nullable();
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('set null');

            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');

            $table->string('name');
            $table->datetime('date');
            $table->string('location');
            $table->string('logo')->nullable();
            $table->string('description_short')->nullable();
            $table->string('description')->nullable();
            $table->date('age_from')->nullable();
            $table->date('age_to')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('type');
            $table->integer('views')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->integer('count_likes')->nullable();
            $table->softDeletes();
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
