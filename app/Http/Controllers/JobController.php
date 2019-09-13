<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::all()->toArray();
        return array_reverse($jobs);
    }

    // public function getskill()
    // {
    //     $skill = Job::select('skills')->get();
    //     return $skill;
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

      


        $job = new Job ([

            'title' => $request->input('title'),
            'customer_id' => 1,
            'description' => $request->input('description'),
            'skills' => $string,
            'location' => $request->input('location'),
            'nearest_station' => $request->input('nearest_station'),
            'employment_status' => $cstring,
            'salary' => $request->input('salary'),
            'allowances' => $request->input('allowances'),  
            'insurance' => $request->input('insurance'),
            'working_hours' => $request->input('working_hours'),
            'holidays' => $request->input('holidays'),
            'user_id' => 1,
            'recordstatus' => 2

        ]);


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
