<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable = ['customer_id','staff','nursing_staff','min_num_staff','num_staff','remarks'];
}
