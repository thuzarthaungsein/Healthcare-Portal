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
use App\Schedule;
use App\Facility;
use App\Subject;
use App\Gallery;
use App\SpecialFeaturesJunctions;
use App\SubjectJunctions;


class ProfilePublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function hospitalProfile($cusid)
    {
        $hospital = HospitalProfile::where('customer_id',$cusid)->get();        

        //for hospital map
        $hoslatlong =  DB::table('customers') ->select('customers.address','hospital_profiles.*')
                        ->join('hospital_profiles','hospital_profiles.customer_id','=','customers.id')
                        ->where('hospital_profiles.customer_id','=',$cusid)->get();

        $facility_list = Facility::select('id','description')->get();
        $profile_facility =  HospitalProfile::select('facilities')->where('customer_id',$cusid)->value('facilities');
        $hosfacility= explode(',',$profile_facility);
        $facility = Facility::whereIn('id',$hosfacility)->select('description','id')->get();
        //for image slide show
        $images = Gallery::where('customer_id',$cusid)->where('type','photo')->select()->get();

        $videos = Gallery::where('customer_id',$cusid)->where('type','video')->select()->get()->toArray();
        // print_r($videos);exit;
        for($i=0;$i<count($videos);$i++) {
            $first_arr = explode('v=',$videos[$i]['photo']);
            $second_arr = explode('&list',$first_arr[1]);
            $videos[$i]['photo'] = $second_arr[0];
        }
        
        return response()->json(array("hoslatlong"=>$hoslatlong,"hospital"=>$hospital,"images"=>$images,"videos"=>$videos,"facility_list"=>$facility_list,"facility"=>$facility));
    }

    public function nursingProfile($cusid)
    {
        
        $feature = NursingProfile::select('feature')->where('customer_id',$cusid)->get();
       
        $method = NursingProfile::select('method')->where('customer_id',$cusid)->get();
        $facility = NursingProfile::where('customer_id',$cusid)->get();
        $comedical = Cooperate_Medical::where('customer_id',$cusid)->get();

        $sql = "SELECT method_payment.* from method_payment INNER JOIN customers ON method_payment.customer_id= customers.id WHERE method_payment.customer_id=$cusid";
        $cost = DB::select($sql);

        //forshow all medical acceptance
        $medicalacceptance = Medical::select('id','name')->get();

        //forshow custom icon
        $medical =  DB::table('acceptance_transactions') ->select('acceptance_transactions.accept_type','medical_acceptance.name')
                        ->join('medical_acceptance','medical_acceptance.id','=','acceptance_transactions.medical_acceptance_id')
                        ->where('acceptance_transactions.customer_id','=',$cusid)->get();

        $staff = Staff::where('customer_id',$cusid)->get();

         //for nursing map
        $nurselatlong =  DB::table('customers') ->select('customers.address','nursing_profiles.*')
                             ->join('nursing_profiles','nursing_profiles.customer_id','=','customers.id')
                             ->where('nursing_profiles.customer_id','=',$cusid)->get();       

        //for image slide show
        $images = Gallery::where('customer_id',$cusid)->where('type','photo')->select()->get();

        $panoimages = Gallery::where('customer_id',$cusid)->where('type','panorama')->select()->get();
        // print_r($panoimages);exit;

        return response()->json(array("feature"=>$feature,"facility"=>$facility,"comedical"=>$comedical,"medicalacceptance"=>$medicalacceptance,"staff"=>$staff, "nurselatlong"=>$nurselatlong,"cost"=>$cost,"medical"=>$medical,"method"=>$method,"images"=>$images,"panoimages"=>$panoimages));
    }

    public function getComment($cusid)
    {
        $sql = "SELECT comments.id,comments.title,comments.email,comments.year,comments.comment from comments INNER JOIN nursing_profiles ON comments.customer_id= nursing_profiles.customer_id WHERE comments.customer_id = $cusid";
        $comment = DB::select($sql);
        return $comment;
    }

    public function getCustomer($cusid,$type)
    {
        // $customer = Customer::where('id',$cusid)->get();
        if($type == 'hospital'){
            $type = 'hospital_profiles';
        }
        else{
            $type = 'nursing_profiles';
        }
        $sql = "SELECT customers.*,$type.* from customers inner join $type on customers.id = $type.customer_id where customers.id = $cusid";
        $customer = DB::select($sql);
        return $customer;
    }

    public function getSpecialfeature($type,$cusid){
        $sfeature = SpecialFeaturesJunctions::where('customer_id',$cusid)->get()->toArray();
        
        if($sfeature != null){
            for($indx = 0; $indx<count($sfeature); $indx++) {
                $sql[] = special_feature::find($sfeature[$indx]['special_feature_id']);
            }
        }
        else{
            $sql = '';
        }
        return response()->json($sql);
    }

    public function getSubject($cusid){
        $sub = SubjectJunctions::where('customer_id',$cusid)->get()->toArray();
        
        if($sub != null){
            for($indx = 0; $indx<count($sub); $indx++) {
                $subject[] = Subject::find($sub[$indx]['subject_id']);
            }
        }
        else{
            $subject = '';
        }
        
        return response()->json($subject);
    }

    public function getSchedule($cusid){
        $schedule_am = Schedule::select('mon','tue','wed','thu','fri','sat','sun')->where('customer_id', $cusid)
                            ->where('part', '=', 'am')
                            ->get();
        $schedule_pm = Schedule::select('mon','tue','wed','thu','fri','sat','sun')->where('customer_id', $cusid)
                            ->where('part', '=', 'pm')
                            ->get();

        return response()->json(array("am"=> $schedule_am, "pm"=> $schedule_pm));
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

    public function getStaffbyCustomerId($cusid) {
        $staff = Staff::where("customer_id",$cusid)->first();

        return $staff;
    }
}
