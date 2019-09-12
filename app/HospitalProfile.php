<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalProfile extends Model
{
    protected $table = 'hospital_profiles';
    protected $fillable = ['customer_id','access','medical_department','specialist','gallery','details_info','subject','closed_day','website','congestion'];
}
