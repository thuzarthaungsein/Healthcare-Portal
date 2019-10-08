<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NursingProfile;
use App\Gallery;
use App\Cooperate_Medical;
use App\method_payment;
use App\Customer;
use App\Staff;
use App\AcceptanceTransaction;
use DB;

class NursingProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function edit($id) {
        $nursing = NursingProfile::find($id);

        return response()->json($nursing);
    }

    public function movePhoto(Request $request) {
        $request = $request->all();

        $destination = 'upload/nursing_profile/'.$request['photo'];
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

    public function cooperateupdate($id,Request $request) {
        $request = $request->all();

        $medical = Cooperate_Medical::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) {
            $data = array(
                'customer_id' => $id,
                'name' => $request[$i]['name'],
                'clinical_subject'=>$request[$i]['subject'],
                'details'=>$request[$i]['details'],
                'medical_expense'=>$request[$i]['expense'],
                'remark'=>$request[$i]['remark'],
            );
            DB::table('cooperate_medical')->insert($data);
        }
       
    }

    public function paymentupdate($id,Request $request) {
        $request = $request->all();

        $payment = method_payment::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) {
            $data = array(
                'customer_id' => $id,
                'payment_name' => $request[$i]['payment_name'],
                'expense_moving'=>$request[$i]['expense_moving'],
                'monthly_fees'=>$request[$i]['monthly_fees'],
                'living_room_type'=>$request[$i]['living_room_type'],
                'area'=>$request[$i]['area'],
                'deposit'=>$request[$i]['deposit'],
                'other_use'=>$request[$i]['other_use'],
                'rent'=>$request[$i]['rent'],
                'admin_expense'=>$request[$i]['admin_expense'],
                'food_expense'=>$request[$i]['food_expense'],
                'nurse_care_surcharge'=>$request[$i]['nurse_care_surcharge'],
                'other_monthly_cost'=>$request[$i]['other_monthly_cost'],
                'refund_system'=>$request[$i]['refund_system'],
                'depreciation_period'=>$request[$i]['depreciation_period'],
                'initial_deprecration'=>$request[$i]['initial_deprecration'],
                'other_message_refund'=>$request[$i]['other_message_refund']
            );
            DB::table('method_payment')->insert($data);
        }
        
    }

    public function profileupdate($id,Request $request) {
        $request = $request->all();
    
        $nursing = NursingProfile::where('customer_id',$id);
        $uploadData = array(
            'access' => $request[0]['access'],
            'business_entity' => $request[0]['business_entity'],
            'website' => $request[0]['website'],
            'feature' => $request[0]['feature'],
            'method' => $request[0]['method'],
            'date_of_establishment' =>  $request[0]['date_of_establishment'],
            'land_right_form'=>  $request[0]['land_right_form'],
            'building_right_form'=>  $request[0]['building_right_form'],
            'site_area' =>  $request[0]['site_area'],
            'floor_area' =>  $request[0]['floor_area'],
            'construction' =>  $request[0]['construction'],
            'capacity' =>  $request[0]['capacity'],
            'num_rooms' =>  $request[0]['num_rooms'],
            'residence_form' =>  $request[0]['residence_form'],
            'fac_type' =>  $request[0]['fac_type'],
            'occupancy_condition' =>  $request[0]['occupancy_condition'],
            'room_floor' =>  $request[0]['room_floor'],
            'living_room_facilities' =>  $request[0]['living_room_facilities'],
            'equipment' =>  $request[0]['equipment'],
            'special_features' =>  $request[0]['special_features'],
            'acceptance_remark' =>  $request[0]['acceptance_remark'],
            'latitude' =>  $request[0]['latitude'],
            'longitude' =>  $request[0]['longitude']
       );

       $nursing->update($uploadData);
    }

    public function Customerprofileupdate($id,Request $request) {
        $request = $request->all();
        $customer = Customer::find($id);
        $uploadData = array(
            'name' => $request[0]['name'],
            'email' =>  $request[0]['email'],
            'phone'=>  $request[0]['phone'],
            'address'=>  $request[0]['address']
       );

       $customer->update($uploadData);

    }

    public function Staffprofileupdate($id,Request $request) {
        $request = $request->all();
     
        $customer = Staff::where('customer_id', $id);
        $uploadData = array(
            'staff' => $request[0]['staff'],
            'nursing_staff' =>  $request[0]['nursing_staff'],
            'min_num_staff'=>  $request[0]['min_num_staff'],
            'num_staff'=>  $request[0]['num_staff'],
            'remarks'=>  $request[0]['nursing_remarks']
       );

       $customer->update($uploadData);
    }

    public function AcceptanceTransactions($id,Request $request) {
        $request = $request->all();

        $transition = AcceptanceTransaction::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) { 
            if($request[$i] != '') {
                $uploadData = array(
                    'customer_id' => $id,
                    'medical_acceptance_id' => $request[$i]['id'],
                    'accept_type'=>  $request[$i]['type']
               );
               DB::table('acceptance_transactions')->insert($uploadData);
            } 
        }

    }
}