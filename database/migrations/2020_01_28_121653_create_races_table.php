<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('name');
            $table->string('location');
            $table->longText('location_link');
            $table->string('start_time');
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references( 'id')->on('clubs')->onDelete('cascade');
            $table->string('max_marshals');
            $table->string('min_marshals')->nullable();
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
        Schema::dropIfExists('races');
    }
}
