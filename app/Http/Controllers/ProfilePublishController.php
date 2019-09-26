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
use App\Customer;
use DB;
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
        return $feature;

    }

    public function getfacilities()
    {
       // $nurse = NursingProfile::all()->toArray();
    //    $nurse = NursingProfile::where('customer_id',5)->get();

       return response()->json(array("nurse"=>$nurse,"test"=>$test));

    }
    public function getSpecialfeature(){
        $specialfeature=NursingProfile::select('special_features')->where('customer_id',4)->value('special_features');
        $array =explode(',',$specialfeature);
        $count = count($array);

        for($i = 0;$i<$count;$i++)
        {
            $special[] =special_feature::find($array[$i]);
        }
        return $special;
     }
     public function getCost(){

     $sql = "SELECT method_payment.* from method_payment   JOIN customers ON method_payment.customer_id= customers.id";
     $nurseCost = DB::select($sql);
     return $nurseCost;
    // foreach($nurseCost as $nuscost){

    //  }
      }


    //  public function getSpecialfeature($id){
    //      $specialfeature=NursingProfile::select('special_features')->where('customer_id',$id)->get();
    //       if($specialfeature[0]["special_features"] != null){
    //         $sql = "select * from special_features where id in(".$specialfeature[0]["special_feature"].")";
    //         $special = DB::select($sql);
    //       }
    //       return response()->json($special);
    //  }

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
        //$cost =method_payment::all()->toArray();
        //return $cost;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    public function getStaffbyCustomerId($customer_id) {
        $staff = Staff::where("customer_id",$customer_id)->get();

        return $staff;
    }
}
