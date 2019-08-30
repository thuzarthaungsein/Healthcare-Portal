<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    public $table = 'medical_acceptance';
    protected $fillable = ['name','user_id','recordstatus'];
}
