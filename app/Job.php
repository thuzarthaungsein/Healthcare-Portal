<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['id','title','customer_id','description','skills','location','nearest_station','employment_status','salary','allowances','insurance','working_hours','holidays','user_id','recordstatus'];
}
