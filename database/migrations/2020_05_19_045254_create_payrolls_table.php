<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('financial_year');
            $table->integer('year');
            $table->integer('month');
            $table->string('description');
            $table->date('extension');
            
            $table->string('emp_name');
            $table->string('emp_designation');
            $table->string('resource');
            $table->string('grade');
            $table->integer('input_days');
            
            $table->date('joining_date');
            $table->string('employment');

            $table->string('project_name');
            $table->string('bank_ac');
            $table->integer('basic');
            $table->integer('house_rent');
            $table->integer('medical');
            $table->integer('conveyance');
            $table->integer('earnleave');
            $table->integer('bonus');
            $table->integer('overtime');
            $table->integer('auctual_gross');
            $table->integer('arrear_adjustment');
            $table->integer('gross_salary');
            $table->integer('pf');
            $table->integer('others');
            $table->integer('total_payable');
            $table->integer('deduction_fp_self');
            $table->integer('deduction_fp_company');
            $table->integer('deduction_tax');
            $table->integer('total_deduction');
            $table->integer('advance');
            $table->integer('net_payment');
            $table->enum('status',['Save',"Draft"]);
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
        Schema::dropIfExists('payrolls');
    }
}
