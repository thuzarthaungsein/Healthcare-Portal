<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['id','title','occupation_id','customer_id','description','skills','location', 'zipcode_id', 'township_id','nearest_station','employment_status', 'salary_type','salary', 'salary_remark','allowances','insurance','working_hours','holidays','user_id','recordstatus'];
}
