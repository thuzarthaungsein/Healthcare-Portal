<?php

namespace App\Http\Controllers;

use App\JobDetail;
use Illuminate\Http\Request;

class JobDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobDetail::all()->toArray();
       return array_reverse($jobs);
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
     * @param  \App\JobDetail  $jobDetail
     * @return \Illuminate\Http\Response
     */
    public function show(JobDetail $jobDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobDetail  $jobDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(JobDetail $jobDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobDetail  $jobDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobDetail $jobDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobDetail  $jobDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobDetail $jobDetail)
    {
        //
    }
}
