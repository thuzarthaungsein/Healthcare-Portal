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
