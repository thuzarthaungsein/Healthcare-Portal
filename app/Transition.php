<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{
    protected $table = 'transition';
    protected $fillable = ['customer_id','acceptance_id','status'];
}
