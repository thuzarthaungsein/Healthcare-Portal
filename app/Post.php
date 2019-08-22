<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','photo','main_point','body','category_id','user_id','recordstatus'
    ];
}
