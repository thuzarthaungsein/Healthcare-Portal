<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Customer;

class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()
    {
        //  $this->middleware('permission:role-list');
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)

    {

        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                     ->with('success','User created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $user = User::find($id);
        return view('users.show',compact('user'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')

                        ->with('success','User updated successfully');
    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');

    }

    public function movePhoto(Request $request) {
        $request = $request->all();
        $user = User::find(auth('api')->user()->id);
        $tmp = $request['file'];

        if($user['type_id'] == '2') {
            $destination = 'upload/hospital_profile/'.$request['photo'];
        }
       else {
            $destination = 'upload/nursing_profile/'.$request['photo'];
        }
        move_uploaded_file($tmp, $destination);
        
    }

    public function changePassword(Request $request) {
        $request = $request->all();
        $user = User::find(auth('api')->user()->id);
    
        if (Hash::check($request['old_pass'], $user['password'])) {
            $user->password = Hash::make($request['new_pass']);
            $user->save();
        } 
        else {
            return response()->json('oldpasswordwrong');
        }
    }

    public function changeEmail(Request $request) {
        $request = $request->all();

        $user = User::find(auth('api')->user()->id);
        $user->email = $request['email'];
        $user->save();

        $customer = Customer::find($user['customer_id']);
        $customer->email = $request['email'];
        $customer->save();
      
    }

    public function getUserInfo() {
        $user = User::find(auth('api')->user()->id);
        return response()->json($user);
    }
}