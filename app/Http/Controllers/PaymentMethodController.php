<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\method_payment;
use DB;

class PaymentMethodController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function getPaymentByCustomerId($customer_id) {
        $paymethod_list = method_payment::where("customer_id",$customer_id)->get()->toArray();
        return $paymethod_list;
    }
}
