<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public $fillable = ['name','user_id','recordstatus'];
}
