<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class method_payment extends Model
{
    //
    public $table = 'method_payment';
    protected $fillable =['customer_id','payment_name','expense_moving','monthly_fees','living_room_type','area','remark'];
}
