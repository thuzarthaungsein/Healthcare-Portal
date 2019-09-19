<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class special_feature extends Model
{
    protected $fillable = ['name','short_name','type','user_id','recordstatus'];
}
