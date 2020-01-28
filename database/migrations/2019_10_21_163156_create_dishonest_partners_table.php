<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishonestPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishonest_partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel_name');
            $table->string('company_name');
            $table->string('legal_entity_name');
            $table->string('head_of_the_company');
            $table->text('contact_person');
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
        Schema::dropIfExists('dishonest_partners');
    }
}
