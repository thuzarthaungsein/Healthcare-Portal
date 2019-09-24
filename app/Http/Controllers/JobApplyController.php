<?php

namespace App\Http\Controllers;

use App\JobApply;
use Illuminate\Http\Request;
use App\Job;
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
            $jobapply->first_name = $request->first_name;
            $jobapply->last_name = $request->last_name;
            $jobapply->birthday = $request->birthday;
            $jobapply->gender = $request->gender;
            $jobapply->postal = $request->postal;
            $jobapply->street_address = $request->str_address;
            $jobapply->home_address = $request->home_address;
            $jobapply->phone = $request->phone;
            $jobapply->email = $request->email;
            $jobapply->qualification = $request->qualification;
            $jobapply->workable_days = $request->workable_day;
            $jobapply->skill = $string;
            $jobapply->remark = $request->remark;
            //  return $jobapply;
             $jobapply->save();
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
