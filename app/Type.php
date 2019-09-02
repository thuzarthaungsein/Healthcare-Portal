<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    
    public $table = 'types';
    protected $fillable = [
        'title','photo','main_point','body','category_id','user_id','recordstatus'
    ];
}
