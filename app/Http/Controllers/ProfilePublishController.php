<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NursingProfile;
<<<<<<< HEAD
use App\method_payment;
=======
use App\Cooperate_Medical;
use App\Medical;
use App\Staff;
>>>>>>> c6f34879ecd5e00fdf6c5759133eb8094da4f3e9

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
        $nurse = NursingProfile::all()->toArray();
        //$nurse = NursingProfile::select('id',1)->get();
        return($nurse);


    }


    public function getcooperatemedical()
    {
        //
        $comedical = Cooperate_Medical::all()->toArray();
        return array_reverse($comedical);
    }

    public function getmedicalacceptance()
    {
        //
        $medical = Medical::select('name')->where('id',1)->get();
        return $medical;
    }

    public function getstaff()
    {
        //
        $staff = Staff::select('staff')->where('id',1)->get();
        return $staff;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $cost =method_payment::all()->toArray();
        return $cost;

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
}
