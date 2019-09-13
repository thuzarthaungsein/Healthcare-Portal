<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public $table = 'advertisements';
    public $fillable = ['title','description','location','link','photo','user_id','recordstatus'];

}
