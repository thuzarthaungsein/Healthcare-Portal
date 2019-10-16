<?php

namespace App\Http\Controllers;

use App\JobApply;
use Illuminate\Http\Request;
use App\Job;
use App\Mail\jobApplyMailToUser;
use App\Mail\jobApplyMailToCustomer;
use App\Mail\jobApplyMailToAdmin;
use DB;
class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
                $string = '';
                $count = count($request->skills);

                for($i = 0;$i< $count ;$i++)
                {

                    if($i == $count-1)
                    {
                        $string .= $request->skills[$i];
                    }else{
                        $string .= $request->skills[$i].',';
                    }

                }
            $jobapply = new JobApply;
            $jobapply->job_id = 1;
            $jobapply->first_name = $request->first_name;
            $jobapply->last_name = $request->last_name;
            $jobapply->birthday = $request->birthday;
            $jobapply->gender = $request->gender;
            $jobapply->postal = $request->postal;
            $jobapply->street_address = $request->str_address;
            $jobapply->home_address = $request->home_address;
            $jobapply->phone = $request->phone;
            $jobapply->email = $request->email;
            $jobapply->skill = $string;
            $jobapply->remark = $request->remark;

            //  return $jobapply;
            $infos = DB::table('jobs')
                            ->join('customers', 'customers.id', '=', 'jobs.customer_id')
                            ->select('jobs.title','customers.email')
                            ->where('jobs.id', '=', 1)
                            ->get();
            foreach($infos as $info) {
                $job_title = $info->title;
                $customer_mail = $info->email;
            }

            $admin_email = 'softguide.sawnwaiyannaing@gmail.com';
             $jobapply->save();
             $jobapply->job_title = $job_title;
             \Mail::to($customer_mail)->send(new jobApplyMailToCustomer($jobapply));
             \Mail::to($jobapply->email)->send(new jobApplyMailToUser($jobapply));
             \Mail::to($admin_email)->send(new jobApplyMailToAdmin($jobapply));
             return response()->json('Apply successfully ');

    }

    public function getSkills()
    {

        $skill = Job::select('skills')->value('skills');
         $array =explode(',',$skill);
            return ($array);

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
