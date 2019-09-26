<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cooperate_Medical;
use DB;

class CooperateMedicalController extends Controller
{
    //
    public function index()
    {
       
    }

    public function getCooperateByCustomerId($customer_id) {
        $cooperate_list = Cooperate_Medical::where("customer_id",$customer_id)->get()->toArray();
        return $cooperate_list;
    }
}
