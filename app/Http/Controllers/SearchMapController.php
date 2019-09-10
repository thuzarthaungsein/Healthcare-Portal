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
        $getTownships = DB::table('townships')->where('city_id',$getCityId)->get();
         return response()->json(['getTownships'=>$getTownships,'getCity'=>$getCity]);
    }
    public function getCity()
    {
        $getCity = DB::table('cities')->get();
        return response()->json($getCity);
    }
}
