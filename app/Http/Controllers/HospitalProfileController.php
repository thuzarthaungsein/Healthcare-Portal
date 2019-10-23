<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HospitalProfile;
use App\Gallery;
use DB;
use App\Medical;
use App\Category;

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
            $sfeature = $fav->special_features;
            if($sfeature != null){
                $sql = "SELECT short_name FROM special_features WHERE id IN (".$sfeature.")";
                $specialfeature = DB::select($sql);
                // $fea_arr = explode(",", $fav->special_features);
                $fav->special_features = $specialfeature;
            }
        }
        return $fav_hospital;
    }

    function getFavouriteNursing($local_sto) {
        $query = "SELECT nursing_profiles.* ,'' AS payment_method, staffs.nursing_staff,customers.name, customers.email, customers.address, customers.logo, townships.township_name, townships.city_id, cities.city_name FROM `nursing_profiles`
                    LEFT JOIN customers ON nursing_profiles.customer_id = customers.id
                    JOIN townships ON townships.id = customers.townships_id
                    LEFT JOIN staffs ON staffs.customer_id = nursing_profiles.customer_id
                    JOIN cities ON townships.city_id = cities.id
                    WHERE nursing_profiles.id IN (" . $local_sto . ")";
        $fav_nursing = DB::select($query);
        foreach($fav_nursing as $nur) {
            $sfeature = $nur->special_features;
            $cId = $nur->customer_id;
            if($sfeature != null){
                $sql = "SELECT short_name FROM special_features WHERE id IN (".$sfeature.")";
                $specialfeature = DB::select($sql);
                // $fea_arr = explode(",", $nur->special_features);
                $nur->special_features = $specialfeature;
            }
            // $sql = "SELECT * FROM acceptance_transactions WHERE customer_id = $cId";
            // $accept_type = DB::select($sql);
            // $nur->medical = $accept_type;
            $sql = "SELECT * FROM method_payment WHERE customer_id = $cId";
            $payment = DB::select($sql);
            $nur->payment_method = $payment;
            $sql = "SELECT MIN(monthly_fees) AS smallestCost, MAX(monthly_fees) AS largeCost FROM method_payment WHERE customer_id=$cId";
            $min_max = DB::select($sql);
            $nur->minmax = $min_max;
        }
        
        return $fav_nursing;
    }

    public function getPostalList($postal){
        $postal = (int)$postal;
        $query = "SELECT * FROM zipcode WHERE zip7_code LIKE '".$postal."%'";
        $postal_list = DB::select($query);
        return $postal_list;
    }

    public function getCitiesName() {
        $query = "SELECT cities.id, cities.city_name FROM cities";
        $city_list = DB::select($query);
        return $city_list;
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

    public function movePhoto(Request $request) {
        $request = $request->all();

        $destination = 'upload/hospital_profile/'.$request['photo'];
        $upload_img = move_uploaded_file($request['file'], $destination);
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
            'closed_day' =>  $request[0]['close_day'],
            'facilities' =>  $request[0]['facilities'],
            'website' =>  $request[0]['website'],
            'congestion' =>  $request[0]['congestion']
       );

       $hospital->update($uploadData);
    }

}
