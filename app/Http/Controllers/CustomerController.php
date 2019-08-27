<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\User;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::all()->toArray();
        return array_reverse($customers);
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
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return response()->json('Customer successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('Customer successfully deleted');
    }

    public function confirm($id)
    {
    
        $getCustomer = Customer::findOrFail($id);
        $checkUser = User::where('email',$getCustomer->email)->select('email')->value('email');
        
        if(!empty($checkUser)){
            return response()->json('user is already confirm!');
        }else{
            $customer = Customer::find($id);
            $customer->status = 'confirm';
            $customer->save();

            $data = array([
                'name'=>$getCustomer->name,
                'email'=>$getCustomer->email,
                'password'=>$getCustomer->password,
            ]);
            DB::table('users')->insert($data);
            $id = $id = DB::getPdo()->lastInsertId();
            $model_has_roles = array([
                'role_id'=>2,
                'model_type'=> 'App\User',
                'model_id'=> $id,
            ]);
             DB::table('model_has_roles')->insert($model_has_roles);
             \Mail::to($getCustomer)->send(new SendMailable($getCustomer));
             return response()->json();
            
            
            
        }
        
        
       
    }
}
