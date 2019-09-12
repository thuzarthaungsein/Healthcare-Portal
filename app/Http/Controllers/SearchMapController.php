<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchMapController extends Controller
{
    public function getMap(Request $request){

        $title = $request->title;
        $mapid = $request->id;

        $getCityId = DB::table('cities')->where('id',$mapid)->select('id')->value('id');
        $getCity = DB::table('cities')->where('id',$mapid)->get();
        $city = DB::table('cities')->get();
        $getTownships = DB::table('townships')->where('city_id',$getCityId)->get();
         return response()->json(['getTownships'=>$getTownships,'getCity'=>$getCity,'city'=>$city]);
    }
    public function getCity(Request $request)
    {
        $id = $request->id;
        $getTownships = DB::table('townships')->where('city_id',$id)->get();
        return response()->json($getTownships);
    }
}
