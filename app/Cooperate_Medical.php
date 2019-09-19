<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperate_Medical extends Model
{
    //
    protected $table = 'cooperate_medical';
    protected $fillable = ['customer_id','clinical_subject','details','medical_expense','remark'];
}
