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


    public function store(Request $request)
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

        $job = new Job ([

            'title' => $request->input('title'),
            'customer_id' => 1,
            'description' => $request->input('description'),
            'skills' => $string,
            'location' => $request->input('location'),
            'nearest_station' => $request->input('nearest_station'),
            'employment_status' => implode(',',$request->input('employment_status')),
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

    public function edit(Job $job)
    {

    }


    public function update(Request $request, Job $job)
    {

    }


    public function destroy(Job $job)
    {

    }
}
