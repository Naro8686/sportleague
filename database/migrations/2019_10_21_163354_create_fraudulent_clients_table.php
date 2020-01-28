<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraudulentClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fraudulent_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel_name');
            $table->string('guest_name');
            $table->string('booker_name');
            $table->string('country');
            $table->string('card_type');
            $table->string('card_number');
            $table->date('date_of_payment');
            $table->text('comment');
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
        Schema::dropIfExists('fraudulent_clients');
    }
}
