<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['title','comment','email','name','year','gender','zipcode','customer_id','status','recordstatus'];

}
