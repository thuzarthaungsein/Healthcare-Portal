<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'customerid','description','skills','location','nearest_station','employment_status','salary','allowances','insurance','working_hours','holidays','user_id','recordstatus'];
}
