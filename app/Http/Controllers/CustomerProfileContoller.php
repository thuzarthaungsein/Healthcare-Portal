<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerProfileContoller extends Controller
{
    function index() {

    }

    function getHospitalHistory() {
        $hos_histories = DB::table('hospital_profiles')
            ->join('customers', 'hospital_profiles.customer_id', '=', 'customers.id')
            ->select('hospital_profiles.*', 'customers.name', 'customers.email', 'customers.logo', 'customers.phone')
            ->get();
        foreach($hos_histories as $hos) {
            $fea_arr = explode(",", $hos->special_features);
            $hos->special_features = $fea_arr;

        }
        return $hos_histories;
    }
}
