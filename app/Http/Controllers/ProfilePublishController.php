<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NursingProfile;
use App\method_payment;
use App\Cooperate_Medical;
use App\Medical;
use App\Staff;
use App\HospitalProfile;
use App\special_feature;

class ProfilePublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nurse = NursingProfile::all()->toArray();
         $feature = NursingProfile::select('feature')->where('id',1)->get();
        $facility = NursingProfile::where('customer_id',5)->get();
        $comedical = Cooperate_Medical::all()->toArray();
        $medical = Medical::select('name')->where('id',1)->get();
        $staff = Staff::where('id',1)->get();
        $nurselatlong = NursingProfile::where('id',1)->get();
        $hoslatlong = HospitalProfile::where('id',1)->get();
        $hospital = HospitalProfile::where('id',4)->get();
        $cost =method_payment::where('id',1)->get();
        return response()->json(array("feature"=>$feature,"facility"=>$facility,"comedical"=>$comedical,"medical"=>$medical,"staff"=>$staff,"nurselatlong"=>$nurselatlong,"hoslatlong"=>$hoslatlong,"hospital"=>$hospital,"cost"=>$cost));
        // return $feature;

    }

    public function getfacilities()
    {
       // $nurse = NursingProfile::all()->toArray();
    //    $nurse = NursingProfile::where('customer_id',5)->get();

       return response()->json(array("nurse"=>$nurse,"test"=>$test));

    }
    public function getSpecialfeature(){
        $specialfeature=HospitalProfile::select('special_features')->where('customer_id',3)->value('special_features');
        $array =explode(',',$specialfeature);
        $count = count($array);

        for($i = 0;$i<$count;$i++)
        {

            $special[] =special_feature::find($array[$i])->toArray();
        }
        return $special;
     }

    public function getcooperatemedical()
    {
        //
        // $comedical = Cooperate_Medical::all()->toArray();
        return array_reverse($comedical);
    }
    public function hospital(){
        // $hospital = HospitalProfile::where('id',4)->get();
        return $hospital;
    }

    public function getmedicalacceptance()
    {
        //
        // $medical = Medical::select('name')->where('id',1)->get();
        return $medical;
    }

    public function getstaff()
    {
        //
        // $staff = Staff::where('id',1)->get();
        return $staff;
    }

    public function getGoogleMapForNurse()
    {
        //
        // $latlong = NursingProfile::where('id',1)->get();
        return $latlong;
    }

    public function getGoogleMapForHospital()
    {
        //
        // $latlong = HospitalProfile::where('id',1)->get();
        return $latlong;
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
    public function show()
    {
        //
        // $cost =method_payment::all()->toArray();
        return $cost;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
