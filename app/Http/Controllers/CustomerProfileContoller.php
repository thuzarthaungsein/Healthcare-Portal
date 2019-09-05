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
            ->join('townships', 'townships.id', '=', 'customers.townships_id')
            ->join('cities', 'townships.city_id', '=', 'cities.id')
            ->select('hospital_profiles.*', 'customers.*' , 'townships.township_name', 'townships.city_id' , 'cities.city_name' )
            ->get();
        foreach($hos_histories as $hos) {
            $fea_arr = explode(",", $hos->special_features);
            $hos->special_features = $fea_arr;
        }
        return $hos_histories;
    }

    function getNursingHistory() {
        $nur_histories = DB::table('nursing_profiles')
            ->join('customers', 'nursing_profiles.customer_id', '=', 'customers.id')
            ->join('townships', 'townships.id', '=', 'customers.townships_id')
            ->join('cities', 'townships.city_id', '=', 'cities.id')
            ->select('nursing_profiles.*', 'customers.*' , 'townships.township_name', 'townships.city_id' , 'cities.city_name' )
            ->get();
        foreach($nur_histories as $nur) {
            $fea_arr = explode(",", $nur->special_features);
            $nur->special_features = $fea_arr;
        }
        return $nur_histories;
    }
}
