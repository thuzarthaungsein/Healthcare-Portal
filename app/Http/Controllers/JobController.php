<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
   
        // $jobs = Job::all()->toarray();
        $profilejob = Job::where('customer_id',auth()->user()->id)->get();
        return response()->json(array('profilejob'=>$profilejob) );
       
    }

    // public function getJob()
    // {
    //     $profilejob = Job::where('customer_id',1)->get();
    //     return response()->json(array('jobs'=>$jobs,'profilejob'=>$profilejob) );
    // }


    public function create()
    {

    }

    public function getSkill()
    {
        $job = Job::select('skills')->value('skills');

        return $job;
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' =>'required',
            'location' => 'required',
            'salary' => 'required',
            'working_hours' => 'required',

        ]);

        $string = '';
        $count = count($request->fields);
        for($i = 0;$i< $count ;$i++)
        {
            if($i == $count-1)
            {
              $string .= $request->fields[$i]['skills'];
            }else{
                $string .= $request->fields[$i]['skills'] .',';
            }
        }



        $cstring = '';
        if($request->employment_status[0]['pchecked'] == true && $request->employment_status[0]['fchecked'] == false)
        {
            $cstring = "Part";
        }
        else if($request->employment_status[0]['fchecked'] == true && $request->employment_status[0]['pchecked'] == false){

            $cstring = "Full";
        }
        else if($request->employment_status[0]['fchecked'] == false && $request->employment_status[0]['pchecked'] == false){
            $request->validate([
                'employment_status' => 'accepted',

            ]);
        }

        else{

            $cstring = "Part,Full";
        }

        $job = new Job();

        $job->title =$request->input('title');
        $job->customer_id= auth()->user()->id;
        $job->description = $request->input('description');
        $job->skills = $string;
        $job->location = $request->input('location');
        $job->nearest_station = $request->input('nearest_station');
        $job->employment_status = $cstring;
        $job->salary = $request->input('salary');
        $job->allowances = $request->input('allowances');
        $job->insurance = $request->input('insurance');
        $job->working_hours = $request->input('working_hours');
        $job->holidays = $request->input('holidays');
        $job->user_id = 1;
        $job->recordstatus = 1;


        $job ->save();
        return $job;
    }


    public function show(Job $job)
    {

    }



    public function edit($id)
    {

        $job = Job::find($id);

        return response()->json($job);
    }



    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' =>'required',
            'location' => 'required',
            'salary' => 'required',
            'working_hours' => 'required',
        ]);


        $job = Job::find($id);
        if($job != null)
        {

            $string = '';
            $count = count($request->fields);
            for($i = 0;$i< $count ;$i++)
            {
                if($i == $count-1)
                {
                  $string .= $request->fields[$i]['skills'];
                }else{
                    $string .= $request->fields[$i]['skills'] .',';
                }

            }


            $cstring = '';
            if($request->employment_status[0]['pchecked'] == true && $request->employment_status[0]['fchecked'] == false)
            {

                $cstring = "Part";
            }
            else if($request->employment_status[0]['fchecked'] == true && $request->employment_status[0]['pchecked'] == false){
                $cstring = "Full";
            }
            else if($request->employment_status[0]['fchecked'] == false && $request->employment_status[0]['pchecked'] == false){
                $request->validate([
                    'employment_status' => 'accepted',

                ]);
            }
            else {
                $cstring = "Part,Full";
            }

            $job->skills = $string;
            $job->title =$request->input('title');
            $job->customer_id= $request->customer_id;
            $job->description = $request->input('description');
            $job->location = $request->input('location');
            $job->nearest_station = $request->input('nearest_station');
            $job->employment_status = $cstring;
            $job->salary = $request->input('salary');
            $job->allowances = $request->input('allowances');
            $job->insurance = $request->input('insurance');
            $job->working_hours = $request->input('working_hours');
            $job->holidays = $request->input('holidays');
            $job->user_id = $request->user_id;
            $job->recordstatus = $request->recordstatus;

            $job ->update();


        }

        return response()->json('The Job successfully updated');
    }


    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return response()->json('The Job successfully deleted');
    }
}
