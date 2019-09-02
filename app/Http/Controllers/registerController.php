<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\password_reset;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendResetPasswordMail;
use Carbon;
use DB;
use App\password_reset_view;
class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
        //return $request;
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'max:13',
            'password' => 'min:6|required_with:comfirm_password|same:comfirm_password',
            'comfirm_password' => 'min:6',
            'address' =>'required',
            'img' => 'required'
            ]);
            

            return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    // regisert end

    public function reset()
    {
        return view('auth.passwordReset');
    }
    public function insertUesr(Request $request)
    {	
        $getEmail = $request->email;
        
        $CheckUserEmail = User::where('email',$getEmail)->select('email')->value('email');
        $checkResetEmail = password_reset::where('email',$getEmail)->select('email')->value('email');
        if(!empty($checkResetEmail)){
            return back()->with('reset','Your Email is already reset password!');
        }else{
            if(!empty($CheckUserEmail)){
                $getUserId = User::where('email',$getEmail)->select('id')->value('id');
                $getCustomerId = Customer::where('email',$getEmail)->select('id')->value('id');
                $getTime = Carbon\Carbon::now();
    
                $data = array([
                    'email' => $getEmail,
                    'user_id' => $getUserId,
                    'customer_id' => $getCustomerId,
                    'created_at' => $getTime,
                ]);
                DB::table('password_reset')->insert($data);
                return back()->with('reset','Check Your email for new password. When admin approved,you can use your password');
    
    
    
            }else{
                return back()->with('reset','Your Email is not register');
            }
        }
    }

    public function getReset()
    {
        $getReset = DB::table('password_reset_view')->get();
        return response()->json($getReset);
    }
    
    public function approve($id)
    {
        $getEmail = password_reset::where('id',$id)->select('email')->value('email');
        
        $password = str_random(6);
        $hashPass = bcrypt($password);
        $updateUser = array(
            'password' => $hashPass
        );
        $updateReset = array(
            'password' => $password,
            'status' => 1
        );
        
        $updateCustomer = array(
            'password' => $hashPass
        );
        DB::table('password_reset')->where('id',$id)->update($updateReset);
        DB::table('users')->where('email',$getEmail)->update($updateUser);
        DB::table('customers')->where('email',$getEmail)->update($updateCustomer);

        $resetPass= password_reset_view::findOrFail($id);
        \Mail::to($getEmail)->send(new sendResetPasswordMail($resetPass));

        return response()->json('success approved and send mail');
    }







}
