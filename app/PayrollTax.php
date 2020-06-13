<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollTax extends Model
{
    protected $fillable = [
                'year',
                'month',
                'pay_order_date',
                'pay_order_number',
                'pay_order_amount',
                'indevisual_amount',
                'payroll_id',
            ];
}
