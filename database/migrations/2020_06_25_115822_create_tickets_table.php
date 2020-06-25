<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('departure');
            $table->string('return');
            $table->string('from');
            $table->string('to');
            $table->string('airline');
            $table->string('mobile')->nullable();
            $table->string('passport');
            $table->string('ticket_no');
            $table->double('rate');
            $table->unsignedBigInteger('agent');
            $table->enum('status', ['Paid', 'Unpaid', 'Canceled'])->default('Unpaid');
            $table->timestamps();
            $table->foreign('agent')->references('id')->on('agents')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
