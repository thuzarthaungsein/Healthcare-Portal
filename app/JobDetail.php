<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    protected $fillable = [
        'job_id','header','body','user_id', 'recordstatus'
    ];
}
