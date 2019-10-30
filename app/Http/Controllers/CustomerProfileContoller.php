<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerProfileContoller extends Controller
{
    function index() {

    }

    function getHospitalHistory($local_sto) {
        $query = "SELECT hospital_profiles.* , group_concat(special_features_junctions.special_feature_id) AS special, group_concat(subject_junctions.subject_id) AS sub, '' AS schedule_am, '' AS schedule_pm, customers.name, customers.email, customers.phone, customers.logo, townships.township_name, townships.city_id, cities.city_name FROM `hospital_profiles`
                LEFT JOIN customers ON hospital_profiles.customer_id = customers.id
                LEFT JOIN townships ON townships.id = customers.townships_id
                LEFT JOIN cities ON townships.city_id = cities.id
                LEFT JOIN special_features_junctions ON special_features_junctions.customer_id = customers.id
                LEFT JOIN subject_junctions ON subject_junctions.customer_id = customers.id
                WHERE hospital_profiles.id IN (" . $local_sto . ") GROUP BY customers.id";
        $hos_histories = DB::select($query);
        foreach($hos_histories as $hos) {
            $sfeature = $hos->special;
            if($sfeature != null){
                $sql = "SELECT short_name FROM special_features WHERE id IN (".$sfeature.")";
                $specialfeature = DB::select($sql);
                $hos->special = $specialfeature;
            }  
            $subject = $hos->sub;
            if($subject != null){
                $sql = "SELECT name FROM subjects WHERE id IN(".$subject.")";
                $subjects = DB::select($sql);
                $hos->sub = $subjects;
            }  
            $cId = $hos->customer_id;
            $sql = "SELECT schedule.* FROM schedule WHERE schedule.customer_id = $cId AND schedule.part = 'am'";
            $schedule_am = DB::select($sql);
            $hos->schedule_am = $schedule_am;
            $sql = "SELECT schedule.* FROM schedule WHERE schedule.customer_id = $cId AND schedule.part = 'pm'";
            $schedule_pm = DB::select($sql);
            $hos->schedule_pm = $schedule_pm;        
        }
        return $hos_histories;
    }

    function getNursingHistory($local_sto) {
        $query = "SELECT nursing_profiles.*, group_concat(special_features_junctions.special_feature_id) AS special, customers.name, customers.email, customers.phone, customers.logo, townships.township_name, townships.city_id, cities.city_name FROM `nursing_profiles`
                    LEFT JOIN customers ON nursing_profiles.customer_id = customers.id
                    LEFT JOIN townships ON townships.id = customers.townships_id
                    LEFT JOIN cities ON townships.city_id = cities.id
                    LEFT JOIN special_features_junctions ON special_features_junctions.customer_id = customers.id
                    WHERE nursing_profiles.id IN (" . $local_sto . ") GROUP BY customers.id";
        $nur_histories = DB::select($query);
        foreach($nur_histories as $nur) {
            $sfeature = $nur->special;
            if($sfeature != null){
                $sql = "SELECT short_name FROM special_features WHERE id IN (".$sfeature.")";
                $specialfeature = DB::select($sql);
                $nur->special = $specialfeature;
            }
        }
        return $nur_histories;
    }
}
