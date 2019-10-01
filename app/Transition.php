<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    protected $table = 'acceptance_transactions';
    protected $fillable = ['customer_id','medical_acceptance_id','accept_type'];
}
