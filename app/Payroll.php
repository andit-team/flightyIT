<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
            'financial_year',
            'year',
            'month',
            'description',
            'emp_name',
            'emp_designation',
            'extension',
            'joining_date',
            'resource',
            'grade',
            'input_days',
            'employment',
            'project_name',
            'bank_ac',
            'basic',
            'house_rent',
            'medical',
            'conveyance',
            'earnleave',
            'bonus',
            'overtime',
            'auctual_gross',
            'arrear_adjusment',
            'gross_salary',
            'total_payable',
            'deduction_fp_self',
            'deduction_fp_company',
            'deduction_tax',
            'total_deduction',
            'advance',
            'net_payment',
            'status'
    ]
}
