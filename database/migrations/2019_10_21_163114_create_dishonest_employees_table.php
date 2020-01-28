<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishonestEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishonest_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel_name');
            $table->string('employee_name');
            $table->string('employee_surname');
            $table->string('position');
            $table->date('date_of_dismissal');
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
        Schema::dropIfExists('dishonest_employees');
    }
}
