<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //
    public $fillable = ['title','description','location','photo','user_id','recordstatus'];

}
