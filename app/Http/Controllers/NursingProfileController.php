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

        $nursing = NursingProfile::where('customer_id', $id)
                    ->first();
        return $nursing;
    }

    public function movePanorama(Request $request) {
        $request = $request->all();
        foreach ($request as $file){
            $destination = 'upload/nursing_profile/Imagepanorama/'.$file->getClientOriginalName();
            $upload_img = move_uploaded_file($file, $destination);
        }
        
        // for($i = 0; $i<sizeof($request)-1; $i++){
        //     if($request['type'] == 'photo') {
        //         $destination = 'upload/nursing_profile/'.$request[$i]['photo'];
        //     }
        //     if($request['type'] == 'panorama') {                
        //         $destination = 'upload/nursing_profile/Imagepanorama/'.$request['file_'.$i];
        //     }
        //     $upload_img = move_uploaded_file($request['file_'.$i], $destination);
        // } 
    }
    public function movePhoto(Request $request) {
        $request = $request->all();
        foreach ($request as $file){
            $destination = 'upload/nursing_profile/'.$file->getClientOriginalName();
            $upload_img = move_uploaded_file($file, $destination);
        }        
    }

    public function galleryupdate($id,Request $request) {
        $request = $request->all();
        if(count($request["video"]) > 0){
            $del_gallery = Gallery::where(['customer_id'=> $id,'type'=>'video'])->delete(); 
            for($i=0; $i<count($request["video"]); $i++) {
                $gallery = new Gallery;
                $gallery->customer_id = $id;
                $gallery->type = $request["video"][$i]['type'];
                $gallery->photo = $request["video"][$i]['photo'];
                $gallery->title = $request["video"][$i]['title'];
                $gallery->description = $request["video"][$i]['description'];
    
                $gallery->save();
            }
        }
        if(count($request["image"]) > 0){
            $del_gallery = Gallery::where(['customer_id'=> $id,'type'=>'photo'])->delete(); 
            for($i=0; $i<count($request["image"]); $i++) {
                $gallery = new Gallery;
                $gallery->customer_id = $id;
                $gallery->type = $request["image"][$i]['type'];
                $gallery->photo = $request["image"][$i]['photo'];
                $gallery->title = $request["image"][$i]['title'];
                $gallery->description = $request["image"][$i]['description'];
    
                $gallery->save();
            }
        }
        if(count($request["panorama"]) > 0){
            $del_gallery = Gallery::where(['customer_id'=> $id,'type'=>'panorama'])->delete(); 
            for($i=0; $i<count($request["panorama"]); $i++) {
                $gallery = new Gallery;
                $gallery->customer_id = $id;
                $gallery->type = $request["panorama"][$i]['type'];
                $gallery->photo = $request["panorama"][$i]['photo'];
                $gallery->title = $request["panorama"][$i]['title'];
                $gallery->description = $request["panorama"][$i]['description'];
    
                $gallery->save();
            }
        }
        // $del_gallery = Gallery::where('customer_id', $id) ->delete();
       
        
    }

    public function cooperateupdate($id,Request $request) {
        $request = $request->all();

        $medical = Cooperate_Medical::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) {
            $cop_medical = new Cooperate_Medical;
            $cop_medical->customer_id = $id;
            $cop_medical->name = $request[$i]['name'];
            $cop_medical->clinical_subject = $request[$i]['subject'];
            $cop_medical->details = $request[$i]['details'];
            $cop_medical->medical_expense = $request[$i]['expense'];
            $cop_medical->remark = $request[$i]['remark'];

            $cop_medical->save();
        }
       
    }

    public function paymentupdate($id,Request $request) {
        $request = $request->all();

        $payment = method_payment::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) {
            $m_payment = new method_payment;
            $m_payment->customer_id = $id;
            $m_payment->payment_name = $request[$i]['payment_name'];
            $m_payment->expense_moving = $request[$i]['expense_moving'];
            $m_payment->monthly_fees = $request[$i]['monthly_fees'];
            $m_payment->living_room_type = $request[$i]['living_room_type'];
            $m_payment->area = $request[$i]['area'];
            $m_payment->deposit = $request[$i]['deposit'];
            $m_payment->other_use = $request[$i]['other_use'];
            $m_payment->rent = $request[$i]['rent'];
            $m_payment->admin_expense = $request[$i]['admin_expense'];
            $m_payment->food_expense = $request[$i]['food_expense'];
            $m_payment->nurse_care_surcharge = $request[$i]['nurse_care_surcharge'];
            $m_payment->other_monthly_cost = $request[$i]['other_monthly_cost'];
            $m_payment->refund_system = $request[$i]['refund_system'];
            $m_payment->depreciation_period = $request[$i]['depreciation_period'];
            $m_payment->initial_deprecration = $request[$i]['initial_deprecration'];
            $m_payment->other_message_refund = $request[$i]['other_message_refund'];

            $m_payment->save();

        }
        
    }

    public function profileupdate($id,Request $request) {
        $request = $request->all();
    
        $nursing = NursingProfile::where('customer_id',$id)->first();

        $nursing->access = $request[0]['access'];
        $nursing->business_entity = $request[0]['business_entity'];
        $nursing->website = $request[0]['website'];
        $nursing->moving_in_from = $request[0]['moving_in_from'];
        $nursing->moving_in_to = $request[0]['moving_in_to'];
        $nursing->per_month_from = $request[0]['per_month_from'];
        $nursing->per_month_to = $request[0]['per_month_to'];
        $nursing->feature = $request[0]['feature'];
        $nursing->method = $request[0]['method'];
        $nursing->date_of_establishment = $request[0]['date_of_establishment'];
        $nursing->land_right_form = $request[0]['land_right_form'];
        $nursing->building_right_form = $request[0]['building_right_form'];
        $nursing->site_area = $request[0]['site_area'];
        $nursing->floor_area = $request[0]['floor_area'];
        $nursing->construction = $request[0]['construction'];
        $nursing->capacity = $request[0]['capacity'];
        $nursing->num_rooms = $request[0]['num_rooms'];
        $nursing->residence_form = $request[0]['residence_form'];
        $nursing->fac_type = $request[0]['fac_type'];
        $nursing->occupancy_condition = $request[0]['occupancy_condition'];
        $nursing->room_floor = $request[0]['room_floor'];
        $nursing->living_room_facilities = $request[0]['living_room_facilities'];
        $nursing->equipment = $request[0]['equipment'];
        $nursing->acceptance_remark = $request[0]['acceptance_remark'];
        $nursing->latitude = $request[0]['latitude'];
        $nursing->longitude = $request[0]['longitude'];
        $nursing->stations = $request[0]['stations'];

        $nursing->save();
    }

    public function Customerprofileupdate($id,Request $request) {
        $request = $request->all();
        $customer = Customer::find($id);

        $customer->name = $request[0]['name'];
        $customer->email = $request[0]['email'];
        $customer->phone = $request[0]['phone'];
        $customer->address = $request[0]['address'];

        $customer->save();
    }

    public function Staffprofileupdate($id,Request $request) {
        
        $request = $request->all();
        $staff = Staff::where('customer_id', $id)->first();
    
        if($staff) {
            $staff->customer_id = $id;
            $staff->staff = $request[0]['staff'];
            $staff->nursing_staff = $request[0]['nursing_staff'];
            $staff->min_num_staff = $request[0]['min_num_staff'];
            $staff->num_staff = $request[0]['num_staff'];
            $staff->remarks = $request[0]['nursing_remarks'];
            $staff->save();
        } else {
            $new_staff = new Staff;
            $new_staff->customer_id = $id;
            $new_staff->staff = $request[0]['staff'];
            $new_staff->nursing_staff = $request[0]['nursing_staff'];
            $new_staff->min_num_staff = $request[0]['min_num_staff'];
            $new_staff->num_staff = $request[0]['num_staff'];
            $new_staff->remarks = $request[0]['nursing_remarks'];
            $new_staff->save();
        }
      
    }

    public function AcceptanceTransactions($id,Request $request) {
        $request = $request->all();

        $transition = AcceptanceTransaction::where('customer_id', $id)
                        ->delete();

        for($i=0; $i<count($request); $i++) { 
            if($request[$i] != '') {
                $accept_transaction = new AcceptanceTransaction;
                $accept_transaction->customer_id = $id;
                $accept_transaction->medical_acceptance_id = $request[$i]['id'];
                $accept_transaction->accept_type = $request[$i]['type'];
                $accept_transaction->save();
            } 
        }

    }
}