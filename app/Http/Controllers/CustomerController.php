<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

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

    public function add(Request $request)
    {
        $imageName = $request->logo->getClientOriginalName();
        
        $request->logo->move(public_path('images'), $imageName);
        

        $customer = new Customer ([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'logo' => $request->logo->getClientOriginalName(),
            'type_id' => 1,
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'user_id' => 3,
            'recordstatus' => 2
          
 
        ]);
        $customer ->save();
        return $customer;

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Customer $customer)
    {
        //
    }


    public function edit($id)
    {
        $customer = Customer::find($id);

        return response()->json($customer);
    }

    public function update($id,Request $request)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return response()->json('Customer successfully updated');
    }


    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('Customer successfully deleted');
    }
}
