<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class method_payment extends Model
{
    //
    public $table = 'method_payment';
    protected $fillable =['customer_id','payment_name','expense_moving','monthly_fees','living_room_type','area','deposit','other_use','rent','admin_expense','food_expense','nurse_care_surcharge','other_monthly_cost','refund_system','depreciation_period','initial_deprecration','other_message_refund'];
}
