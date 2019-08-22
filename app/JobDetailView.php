<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDetailView extends Model
{
    public $table = 'job_detail_view';
    protected $fillable = [
        'job_id','job_detail_id','jobs_title','jobs_detail_header', 'jobs_detail_body'
    ];
}
