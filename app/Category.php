<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        public $timestamps = true;
        protected $table = 'categories';
        public $fillable = ['id','name','user_id','recordstatus','created_at','updated_at'];

}
