<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;
class SearchMapController extends Controller
{
    public function getMap(Request $request, $id){
     
      
   
        $query = "SELECT n.id,n.latitude as lat ,n.longitude as lng from customers As c  Join townships As t on t.id =  c.townships_id Join nursing_profiles As n on n.customer_id = c.id 
            where t.city_id =".$id." order BY n.id ASC LIMIT 26";
        $nus_latlng = DB::select($query);

    
        $title = $request->title;
        $mapid = $request->id;

        $getCityId          = DB::table('cities')->where('id',$mapid)->select('id')->pluck('id');
        $getCity            = DB::table('cities')->where('id',$mapid)->get();
        $city               = DB::table('cities')->get();
        $getTownships       = DB::table('townships')->where('city_id',$getCityId)->get();
        $special_features   = DB::table('special_features')->get();
        $fac_types          = DB::table('fac_types')->get();
        $subjects           = DB::table('subjects')->get();
        $medical_acceptance = DB::table('medical_acceptance')->get();
        $occupations        = DB::table('occupation')->get();
        return response()->json(['getTownships'=>$getTownships,
                                 'getCity'=>$getCity,
                                 'city'=>$city,
                                 'special_features'=>$special_features,
                                 'fac_types'=>$fac_types,
                                 'medical_acceptance'=>$medical_acceptance,
                                 'subjects'=>$subjects,
                                 'nus_latlng' => $nus_latlng,
                                 'occupations'=>$occupations]);
    }

    public  function getMapTownship($id)
    {
      
            $query = "SELECT n.id,n.latitude as lat ,n.longitude as lng from customers As c  Join nursing_profiles As n on n.customer_id = c.id 
            where c.townships_id IN (" . $id . ")  order BY n.id ASC LIMIT 26";
           
            $nus_latlng = DB::select($query);
           
       
          return response()->json($nus_latlng);
      
       
    } 


    public function getSearch()
    {
        
        $id = $_GET['id'];
        $townshipID = $_GET['townshipID'];
        $occupationID = $_GET['occupationID'];
        $empstatus = $_GET['empstatus'];
        
    
    }
 

    
    public function getCity(Request $request)
    {
        $id = $request->id;
        $getTownships = DB::table('townships')->where('city_id',$id)->get();
        return response()->json($getTownships);
    }
}
