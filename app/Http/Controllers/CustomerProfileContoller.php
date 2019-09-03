<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerProfileContoller extends Controller
{
    function index() {

    }

    function getHospitalHistory() {
        // $hos_histories = HospitalProfile::all()->toArray();
        

        $hos_histories = DB::table('hospital_profiles')
            ->join('customers', 'hospital_profiles.customer_id', '=', 'customers.id')
            ->select('hospital_profiles.*', 'customers.name', 'customers.email', 'customers.logo', 'customers.phone')
            ->first();

        return $hos_histories->facilities;
    }
}
