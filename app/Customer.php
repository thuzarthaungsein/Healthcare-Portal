<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['name','email','password','logo','type_id','phone','address','user_id','recordstatus'];
}
