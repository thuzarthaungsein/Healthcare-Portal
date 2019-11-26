<?php

namespace App\Http\Controllers;

use App\Job;
use App\Occupations;
use Illuminate\Http\Request;
use DB;

class JobController extends Controller
{

    public function index()
    {
        $query = "SELECT jobs.* ,customers.type_id, 
        (CASE customers.type_id WHEN '2' THEN CONCAT((500000+jobs.id),'-',LPAD(jobs.id, 4, '0')) ELSE CONCAT((200000+jobs.id),'-',LPAD(jobs.id, 4, '0')) END) as jobid
        FROM `jobs`
        JOIN customers ON jobs.customer_id = customers.id
        LEFT JOIN job_applies ON jobs.id = job_applies.job_id
        WHERE customers.recordstatus=1 and jobs.customer_id = ".auth()->user()->customer_id." GROUP BY jobs.id ORDER BY jobs.id DESC";
        $profilejob = DB::select($query);

        foreach($profilejob as $jobs){
            $job_id = $jobs->id;
            $jobapplies =  DB::table('job_applies')->join('jobs','job_applies.job_id','=','jobs.id')
                           ->where('job_applies.job_id','=',$job_id)->count();
            $jobs->count = $jobapplies;
        }
        return response()->json(array('profilejob'=>$profilejob));

    }

    public function create()
    {

    }

    public function getOccupationList()
    {
        $occupationlist = Occupations::select('id','name')->get()->toArray();

        return response()->json($occupationlist);
    }

    public function getSkill()
    {
        $job = Job::select('skills')->value('skills');

        return $job;
    }
    public function getTownshipId($city_name)
    {
        $query = "SELECT id  FROM `townships`
                    WHERE township_name = " . $city_name;

        $township_id = DB::select($query);
        return $township_id;
    } 

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' =>'required',
        //     'location' => 'required',
        //     'salary' => 'required',
        //     'working_hours' => 'required',

        // ],[
        //     'title.required'=>'施設種別が必須です。',
        //     'description.required'=>'仕事内容が必須です。',
        //     'location.required'=>'勤務地が必須です。',
        //     'salary.required'=>'給与が必須です。',
        //     'working_hours.required'=>'就業時間が必須です。',
        // ]);

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

        //    $cstring = '';
        //    if($request->employment_status[0]['pchecked'] == true)
        //    {
        //       $cstring .=  "Part";
        //    }
        //    else if($request->employment_status[0]['fchecked'] == true)
        //    {
        //        if($cstring == '')
        //        {
        //           $cstring = "Full" ;
        //        }
        //        else{
        //           $cstring .=  " ,Full";
        //        }

        //    }
        //     if($request->employment_status[0]['echecked'] == true)
        //    {
        //         if($cstring == '')
        //         {
        //         $cstring = "EmploymentStatus" ;
        //         }
        //         else{
        //         $cstring .=  " ,EmploymentStatus";
        //         }
        //    }
        //     if($request->employment_status[0]['cchecked'] == true)
        //    {
        //         if($cstring == '')
        //         {
        //         $cstring = "ContractEmployee" ;
        //         }
        //         else{
        //         $cstring .=  " ,ContractEmployee";
        //         }
        //    }
        //     if($request->employment_status[0]['ochecked'] == true)
        //    {
        //         if($cstring == '')
        //         {
        //         $cstring = "Other" ;
        //         }
        //         else{
        //         $cstring .=  " ,Other";
        //         }
        //    }


        // $cstring = '';
        // if($request->employment_status[0]['pchecked'] == true && $request->employment_status[0]['fchecked'] == false && $request->employment_status[0]['echecked'] == false && $request->employment_status[0]['cchecked']  == false && $request->employment_status[0]['ochecked'] == false)
        // {
        //     $cstring = "Part";
        // }
        // else if($request->employment_status[0]['fchecked'] == true && $request->employment_status[0]['pchecked'] == false && $request->employment_status[0]['echecked'] == false && $request->employment_status[0]['cchecked']  == false && $request->employment_status[0]['ochecked'] == false){

        //     $cstring = "Full";
        // }
        // else if($request->employment_status[0]['fchecked'] == false && $request->employment_status[0]['pchecked'] == false){
        //     $request->validate([
        //         'employment_status' => 'accepted',

        //     ]);
        // }

        // else{

        //     $cstring = "Part,Full";
        // }

        $job = new Job();
        // if($request->occupation_id != null)
        // {
        //     $job->occupation_id = $request->occupation_id;
        // }else{
        //     $job->occupation_id = 0;
        // }
        $job->occupation_id = $request->occupation_id;
        $job->title =$request->input('title');
        $job->customer_id= auth()->user()->customer_id;

        $job->description = $request->input('description');
        $job->skills = $string;
        // $job->city_id = $request->input('city_id');
        // $job->street_address = $request->input('str_address');
        $job->location = $request->input('location');
        $job->nearest_station = $request->input('nearest_station');
        $job->employment_status = $request->employmentstatus;
        $job->salary_type = $request->input('salary_type');
        $job->salary = $request->input('salary');
        $job->salary_remark = $request->input('salary_remark');
        $job->allowances = $request->input('allowances');
        $job->insurance = $request->input('insurance');
        $job->working_hours = $request->input('working_hours');
        $job->holidays = $request->input('holidays');
        $job->user_id = 1;
        $job->recordstatus = 1;
        $job->zipcode_id = $request->input('zipcode_id');

        // $query = "SELECT townships.id FROM `townships` INNER JOIN zipcode on townships.township_name = zipcode.city
        //     WHERE zipcode.id = " . $request->input('zipcode_id');
        // $tid = DB::select($query);
        
        // $infos = DB::table('jobs')
        // ->join('customers', 'customers.id', '=', 'jobs.customer_id')
        // ->select('jobs.*','customers.email')
        // ->where('jobs.id', '=', $jobapply->job_id)
        // ->get();
        $tid = DB::table('townships')
             ->join('zipcode','zipcode.city','=','townships.township_name')
             ->select('townships.id')
              ->where('zipcode.id','=',$request->input('zipcode_id'))
              ->value('townships.id');
        $job->township_id = $tid;
       
        $job->save();
        return $job;
    }

    public function show(Job $job)
    {

    }



    public function edit($id)
    {

        // $job = Job::find($id);
        $sql = "SELECT jobs.*, zipcode.id as zip_id, zipcode.zip7_code, zipcode.pref as cityname, zipcode.city as township, zipcode.street from jobs inner join zipcode on jobs.zipcode_id = zipcode.id WHERE jobs.id = $id";
        $job = DB::select($sql);

        return response()->json($job);
    }



    public function update($id, Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' =>'required',
        //     'location' => 'required',
        //     'salary' => 'required',
        //     'working_hours' => 'required',
        // ]);


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

            if($request->occupation_id != null)
            {
                $job->occupation_id = $request->occupation_id;
            }else{
                $job->occupation_id = 0;
            }
            $job->title =$request->input('title');
            $job->customer_id= auth()->user()->customer_id;

            $job->description = $request->input('description');
            $job->skills = $string;
            // $job->city_id = $request->input('city_id');
            // $job->street_address = $request->input('str_address');
            $job->location = $request->input('location');
            $job->nearest_station = $request->input('nearest_station');
            $job->employment_status = $request->employmentstatus;
            $job->salary_type = $request->input('salary_type');
            $job->salary = $request->input('salary');
            $job->salary_remark = $request->input('salary_remark');
            $job->allowances = $request->input('allowances');
            $job->insurance = $request->input('insurance');
            $job->working_hours = $request->input('working_hours');
            $job->holidays = $request->input('holidays');
            $job->user_id = 1;
            $job->recordstatus = 1;
            $job->zipcode_id = $request->input('zipcode_id');

            // $query = "SELECT townships.id FROM `townships` INNER JOIN zipcode on townships.township_name = zipcode.city
            //     WHERE zipcode.id = " . $request->input('zipcode_id');
            // $tid = DB::select($query);
            
            // $infos = DB::table('jobs')
            // ->join('customers', 'customers.id', '=', 'jobs.customer_id')
            // ->select('jobs.*','customers.email')
            // ->where('jobs.id', '=', $jobapply->job_id)
            // ->get();
            $tid = DB::table('townships')
                ->join('zipcode','zipcode.city','=','townships.township_name')
                ->select('townships.id')
                ->where('zipcode.id','=',$request->input('zipcode_id'))
                ->value('townships.id');
            $job->township_id = $tid;
        
            $job->save();

            


            // // $cstring = '';
            // // if($request->employment_status[0]['pchecked'] == true && $request->employment_status[0]['fchecked'] == false)
            // // {

            // //     $cstring = "Part";
            // // }
            // // else if($request->employment_status[0]['fchecked'] == true && $request->employment_status[0]['pchecked'] == false){
            // //     $cstring = "Full";
            // // }
            // // else if($request->employment_status[0]['fchecked'] == false && $request->employment_status[0]['pchecked'] == false){
            // //     $request->validate([
            // //         'employment_status' => 'accepted',

            // //     ]);
            // // }
            // // else {
            // //     $cstring = "Part,Full";
            // // }

            // if($request->occupation_id != null)
            // {
            //     $job->occupation_id = $request->occupation_id;
            // }else{
            //     $job->occupation_id = 0;
            // }
            // $job->skills = $string;
            // $job->title =$request->input('title');
            // $job->customer_id= $request->customer_id;
            // $job->description = $request->input('description');
            // $job->location = $request->input('location');
            // $job->nearest_station = $request->input('nearest_station');
            // $job->employment_status = $request->employmentstatus;
            // $job->salary = $request->input('salary');
            // $job->allowances = $request->input('allowances');
            // $job->insurance = $request->input('insurance');
            // $job->working_hours = $request->input('working_hours');
            // $job->holidays = $request->input('holidays');
            // $job->user_id = $request->user_id;
            // $job->recordstatus = $request->recordstatus;

            // $job ->update();


        }

        return response()->json('The Job successfully updated');
    }


    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return response()->json('The Job successfully deleted');
    }
    public function search(Request $request) {
        $request = $request->all();
        $search_word = $request['search_word'];
        $customer_id = $request['customer_id'];

        $query = Job::query();
        $query = $query->where('customer_id', $customer_id);
        $query = $query->where(function($qu) use ($search_word){
                            $qu->where('title', 'LIKE', "%{$search_word}%")
                                ->orWhere('description', 'LIKE', "%{$search_word}%");
                        });
        $query = $query->orderBy('id','DESC')
                        ->get()
                        ->toArray();
        return $query;
    }
}
