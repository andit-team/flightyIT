<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year');
            $table->string('month');
            $table->date('pay_order_date');
            $table->string('pay_order_number');
            $table->integer('pay_order_amount');
            $table->integer('indevisual_amount');
            $table->unsignedBigInteger('payroll_id');
            $table->timestamps();

            $table->foreign('payroll_id')->references('id')->on('payrolls')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_taxes');
    }
}
