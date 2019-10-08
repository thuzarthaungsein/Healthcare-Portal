<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptanceTransaction extends Model
{
    public $table = 'acceptance_transactions';
    public $fillable = ['medical_acceptance_id','customer_id','accept_type'];

}
