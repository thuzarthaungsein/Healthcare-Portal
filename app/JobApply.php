<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    //
    protected $fillable =['first_name','last_name','birthday','gender','postal', 'str_address', 'city_id', 'home_address','phone', 'email','skill', 'remark'];
}
