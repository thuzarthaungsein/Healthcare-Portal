<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class password_reset_view extends Model
{   
    public $table = 'password_reset_view';
    protected $fillable = ['email','user_id','customer_id','name','password','status','password_reset_id'];//
}
