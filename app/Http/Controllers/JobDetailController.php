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
        $query = "SELECT jobs.* ,customers.type_id FROM `jobs`
                    JOIN customers ON jobs.customer_id = customers.id
                    WHERE jobs.id = $id";
        $selectedJob = DB::select($query);
        foreach($selectedJob as $job) {
            $cId = $job->customer_id;
            if($job->type_id == 2){
                $job->customer_id = 500000 + $cId;
            }else{
                $job->customer_id = 100000 + $cId;
            }            
            $jId = $job->id;
            $numlength = strlen((string)$jId);
            if($numlength == 4){
                 $jId = (string)$jId;
            }else if($numlength == 3){
                $jId = '0'.(string)$jId;
            }else if($numlength == 2){
                $jId = '00'.(string)$jId;
            }else{
                $jId = '000'.(string)$jId;
            }
            $job->id = $job->customer_id .'-'. $jId;
        }
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
