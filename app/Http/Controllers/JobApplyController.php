<?php

namespace App\Http\Controllers;

use App\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    // public function apply(Request $request){
    //     $jobapply = new JobApply([
    //         'name' => $request->input('name'),
    //         'birthday' => 1,
    //         'address' => 2,
    //         'phone' => 3,
    //         'email'=>4,
    //         'work-time'=>5,
    //         'skill'=>6
    //     ]);
    //     $jobapply->save();
    //     return $jobapply;
    // }

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


            $jobapply = new JobApply([
                 'name' => $request->input('name'),
                 'birthday' =>  $request->input('birthday'),
                 'address' =>  $request->input('address'),
                 'phone' =>  $request->input('phone'),
                 'email'=> $request->input('email'),
                 'work_time'=>$request->input('work_time'),
                 'skill'=>implode("," , $request->input('skill'))
                // //$jobapply->skill=skills,

             ]);
             $jobapply->save();

             return response()->json('Apply successfully ');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobApply  $jobApply
     * @return \Illuminate\Http\Response
     */
    public function show(JobApply $jobApply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobApply  $jobApply
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApply $jobApply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobApply  $jobApply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApply $jobApply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobApply  $jobApply
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApply $jobApply)
    {
        //
    }
}
