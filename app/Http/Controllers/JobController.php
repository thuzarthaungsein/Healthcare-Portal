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

 
    public function create()
    {
        
    }

 
    public function store(Request $request)
    {
        
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
