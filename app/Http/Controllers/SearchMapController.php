<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchMapController extends Controller
{
    public function getMap(Request $request, $id){

        // return response()->json($id);
        
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
        $occupations        = DB::table('occupations')->get();
        return response()->json(['getTownships'=>$getTownships,
                                 'getCity'=>$getCity,
                                 'city'=>$city,
                                 'special_features'=>$special_features,
                                 'fac_types'=>$fac_types,
                                 'medical_acceptance'=>$medical_acceptance,
                                 'subjects'=>$subjects,
                                 'occupations'=>$occupations]);
    }
    public function getCity(Request $request)
    {
        $id = $request->id;
        $getTownships = DB::table('townships')->where('city_id',$id)->get();
        return response()->json($getTownships);
    }
}
