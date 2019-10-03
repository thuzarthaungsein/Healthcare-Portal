<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupations extends Model
{
    protected $table = 'occupation';
    protected $fillable = ['id','name','user_id','parent','recordstatus'];
}
