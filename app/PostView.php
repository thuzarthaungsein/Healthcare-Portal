<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    public $table = 'post_view';
    protected $fillable = [
        'category_id','post_id','category_name','post_title','post_photo','post_mainPoint'
    ];
}
