<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NursingProfile extends Model
{
    //
    protected $table = 'nursing_profiles';
    protected $fillable = ['customer_id','access','access','gallery','feature','business_entity','date_of_establishment','land_right_form','building_right_form','site_area','floor_area','construction','capacity','num_rooms','residence_form','fac_type','occupancy_condition','room_floor','living_room_facilities','website','equipment','medical_acceptable','medical_unacceptable','medical_negotiable','dementia','staff_system','special_features'];
}
