<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('in_or_out', ['IN', 'OUT']);
            $table->string('transaction_id')->unique();
            $table->date('due_date')->nullable();
            $table->integer('equipment_id')->unsigned();
            $table->integer('username')->unsigned();
            $table->timestamps();
            $table->foreign('equipment_id')
                ->references('id')->on('equipment');
            $table->foreign('username')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
