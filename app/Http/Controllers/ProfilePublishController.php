<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NursingProfile;
use App\method_payment;
use App\Cooperate_Medical;
use App\Medical;
use App\Staff;
use App\HospitalProfile;
use App\AcceptanceTransaction;
use DB;
use App\special_feature;
use App\Customer;
use App\Comment;
use App\Gallery;
use App\Facility;

class ProfilePublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $feature = NursingProfile::select('feature')->where('customer_id',4)->get();
        $method = NursingProfile::select('method')->where('customer_id',1)->get();
        $facility = NursingProfile::where('customer_id',1)->get();
        $comedical = Cooperate_Medical::where('customer_id',1)->get();

        //forshow all medical acceptance
        $medicalacceptance = Medical::select('id','name')->get();

        //forshow custom icon
        $medical =  DB::table('acceptance_transactions') ->select('acceptance_transactions.accept_type','medical_acceptance.name')
                        ->join('medical_acceptance','medical_acceptance.id','=','acceptance_transactions.medical_acceptance_id')
                        ->where('acceptance_transactions.customer_id','=',1)->get();

        $staff = Staff::where('customer_id',1)->get();

         //for nursing map
        $nurselatlong =  DB::table('customers') ->select('customers.address','nursing_profiles.*')
                             ->join('nursing_profiles','nursing_profiles.customer_id','=','customers.id')
                             ->where('nursing_profiles.customer_id','=',1)->get();

        //for hospital map
        $hoslatlong =  DB::table('customers') ->select('customers.address','hospital_profiles.*')
                             ->join('hospital_profiles','hospital_profiles.customer_id','=','customers.id')
                             ->where('hospital_profiles.customer_id','=',3)->get();

        //for image slide show
        $images = Gallery::where('customer_id',1)->where('type','photo')->select()->get();

     
        

        $hospital = HospitalProfile::where('customer_id',1)->get();

        $sql = "SELECT method_payment.* from method_payment   JOIN customers ON method_payment.customer_id= customers.id";
        $cost = DB::select($sql);

        return response()->json(array("feature"=>$feature,"facility"=>$facility,"comedical"=>$comedical,"medicalacceptance"=>$medicalacceptance,"staff"=>$staff,
           "nurselatlong"=>$nurselatlong,"hoslatlong"=>$hoslatlong,"hospital"=>$hospital,"cost"=>$cost,"medical"=>$medical,"method"=>$method,"images"=>$images));
    }

    public function getComment()
    {
        //$comment=Comment::all();
        // $comment = Comment::where('customer_id',1)->get();
        // return $comment;
        $sql = "SELECT comments.id,comments.title,comments.email,comments.year,comments.comment from comments  JOIN nursing_profiles ON comments.customer_id= nursing_profiles.customer_id";
        $comment = DB::select($sql);
        return $comment;
    }

    public function getCustomer()
    {
        $customer = Customer::where('id',1)->get();
        return $customer;
    }

    public function getSpecialfeature($type){
        if($type == 'hospital'){
            $sfeature=HospitalProfile::select('special_features')->where('customer_id',3)->value('special_features');
        }
        else{
            $sfeature=NursingProfile::select('special_features')->where('customer_id',1)->value('special_features');
        }

        $sql = "SELECT * FROM special_features WHERE id IN (".$sfeature.")";
        $specialfeature = DB::select($sql);
        return response()->json($specialfeature);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        //


    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function getStaffbyCustomerId($customer_id) {
        $staff = Staff::where("customer_id",$customer_id)->get();

        return $staff;
    }
}
