<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HospitalProfile;
use App\Gallery;
use DB;

class HospitalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = value;
        // foreach($test as $test){
        //     $favourite_list = HospitalProfile::where('id',$test)->get();
        // }
        
        // return response()->json(array_reverse($favourite_list));
    }

    function getFavouriteHospital($local_sto) {
        $query = "SELECT hospital_profiles.* ,customers.name, customers.email, customers.phone, customers.logo, townships.township_name, townships.city_id, cities.city_name FROM `hospital_profiles`
                    JOIN customers ON hospital_profiles.customer_id = customers.id
                    JOIN townships ON townships.id = customers.townships_id
                    JOIN cities ON townships.city_id = cities.id
                    WHERE hospital_profiles.id IN (" . $local_sto . ")";
        $fav_hospital = DB::select($query);
        foreach($fav_hospital as $fav) {
            $fea_arr = explode(",", $fav->special_features);
            $fav->special_features = $fea_arr;
        }
        return $fav_hospital;
    }

    function getFavouriteNursing($local_sto) {
        $query = "SELECT nursing_profiles.* ,customers.name, customers.email, customers.phone, customers.logo, townships.township_name, townships.city_id, cities.city_name FROM `nursing_profiles`
                    JOIN customers ON nursing_profiles.customer_id = customers.id
                    JOIN townships ON townships.id = customers.townships_id
                    JOIN cities ON townships.city_id = cities.id
                    WHERE nursing_profiles.id IN (" . $local_sto . ")";
        $fav_nursing = DB::select($query);
        foreach($fav_nursing as $nur) {
            $fea_arr = explode(",", $nur->special_features);
            $nur->special_features = $fea_arr;
        }
        return $fav_nursing;
    }

    public function getPostalList($postal){
        $query = "SELECT * FROM zipcode WHERE zip7_code LIKE '".$postal."%'";
        $postal_list = DB::select($query);
        return $postal_list;
    }

    public function getCitiesName() {
        $query = "SELECT cities.id, cities.city_name FROM cities";
        $city_list = DB::select($query);
        return $city_list;
    }

    public function getSelectedCityName($selectedId){
        $query = "SELECT cities.id AS c_Id, zipcode.id, zipcode.pref, CONCAT(zipcode.city,' ', zipcode.street) AS street FROM zipcode
                    RIGHT JOIN cities
                    ON zipcode.city_id = cities.id
                    WHERE zipcode.id = $selectedId";
        $selectedCity = DB::select($query);
        return $selectedCity;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = HospitalProfile::find($id);

        return response()->json($hospital);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite_list = HospitalProfile::find($id);
        $favourite_list->delete();
        return response()->json('The successfully deleted');
    }

    public function galleryupdate($id,Request $request) {
        $request = $request->all();

        $gallery = Gallery::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) {
            $data = array(
                'customer_id' => $id,
                'type' => $request[$i]['type'],
                'photo'=>$request[$i]['photo'],
                'title'=>$request[$i]['title'],
                'description'=>$request[$i]['description'],
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s')
            );
            DB::table('galleries')->insert($data);
        }
    }

    public function profileupdate($id,Request $request) {
        $request = $request->all();
    
        $hospital = HospitalProfile::where('customer_id',$id);
        $uploadData = array(
            'access' => $request[0]['access'],
            'specialist' =>  $request[0]['specialist'],
            'details_info'=>  $request[0]['details_info'],
            'subject'=>  $request[0]['subject'],
            'closed_day' =>  $request[0]['close_day'],
            'facilities' =>  $request[0]['facilities'],
            'website' =>  $request[0]['website'],
            'special_features' =>  $request[0]['special_features'],
            'congestion' =>  $request[0]['congestion']
       );

       $hospital->update($uploadData);
    }

}
