<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = 'subject';
    protected $fillable = ['id','name','user_id','parent','recordstatus'];
}
