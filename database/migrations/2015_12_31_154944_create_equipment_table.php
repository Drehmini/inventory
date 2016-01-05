<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial')->unique(); // unique serial numbers
            $table->enum('type', ['Laptop', 'Projector', 'Tablet', 'Projector Screen']);
            $table->string('make');
            $table->string('model');
            $table->boolean('is_available');
            $table->timestamp('purchase_date');
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
        Schema::drop('equipment');
    }
}
