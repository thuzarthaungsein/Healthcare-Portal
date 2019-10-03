<?php

namespace App\Http\Controllers;

use App\Job;
use DB;
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
        $job_details = Job::all()->toArray();
        return array_reverse($job_details);
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
    public function show($id)
    {
        $query = "SELECT jobs.* ,customers.type_id, 
        (CASE customers.type_id WHEN '2' THEN CONCAT((500000+jobs.id),'-',LPAD(jobs.id, 4, '0')) ELSE CONCAT((200000+jobs.id),'-',LPAD(jobs.id, 4, '0')) END) as jobid
        FROM `jobs`
        JOIN customers ON jobs.customer_id = customers.id
        WHERE jobs.id = $id";
        $selectedJob = DB::select($query);
        
        return $selectedJob;
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
