<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class password_reset extends Model
{   public $table = 'password_reset';
    protected $fillable = ['email','user_id','customer_id','created_at'];
}
