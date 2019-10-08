<?php

namespace App\Http\Controllers;

use App\Subject;
use App\HospitalProfile;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        $Subjects = Subject::all()->toArray();
    
        for($i=0;$i<count($Subjects);$i++)
        {
            if($Subjects[$i]['parent'] != 0)   
            {
               $Subjects[$i]['parent']  = Subject::where('id',$Subjects[$i]['parent'])->select('name')->value('name');  
            }
            else{
                $Subjects[$i]['parent'] = "None";
            }           
         
        }
      
        return response()->json($Subjects);
      
    }

    public function Subjectlist()
    {

        $Subjectlist = Subject::select('id','name')->where('parent',0)->get()->toArray();
      
        return $Subjectlist;
    }

    public function getParent()
    {

        $Subjectlist = Subject::select('id','name')->get()->toArray();

        return $Subjectlist;
    }



    public function create()
    {

    }

    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required',
        ]);

        if( $request->parent != null)
        {
           
            $Subject = new Subject();
            $Subject->name = $request->input('name');
            $Subject->user_id = 1;
            $Subject ->parent = $request->parent;
            $Subject ->recordstatus = 1;

        }
        else if( $request->parent == null)
        {
            
            
            $Subject = new Subject();
            $Subject->name = $request->input('name');
            $Subject->user_id = 1;
            $Subject ->parent = 0;
            $Subject ->recordstatus = 2;

        }
      
        $Subject->save();

        return $Subject;
    }


    public function show(Subject $Subject)
    {

    }


    public function edit($id)
    {
        $subject = Subject::find($id);
        return response()->json($subject);
    }


    public function update($id, Request $request)   
    {
      
        $request->validate([
            'name' => 'required',
        ]);
        if($request->parent != null)
        {
            $Subject = Subject::find($id);
            $Subject->name = $request->input('name');
            $Subject->user_id = 1;
            $Subject ->parent = $request->parent;
            $Subject ->recordstatus = 1;
            $Subject->save();
        }
        else{
            $Subject = Subject::find($id);
            $Subject->name = $request->input('name');
            $Subject->user_id = 1;
            $Subject ->parent = 0;
            $Subject ->recordstatus = 1;
            $Subject->save(); 
        }
      
       
        // $Subject->update($request->all());

        return response()->json('The Subject successfully updated');
    }

    public function destroy($id)
    {
        $Subject = Subject::find($id);
        $Subject->delete();
        return response()->json('The Subject was successfully deleted');
    }

    public function search(Request $request) {
        $request = $request->all();
        $search_word = $request['search_word'];

        $search_subjects = Subject::query()
                            ->where('name', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $search_subjects;
    }

    public function getHospitalClinicalSubject($customer_id) {
        $subject_list = Subject::all()->toArray();

        $clinical_subject = HospitalProfile::where('customer_id','=',$customer_id)->value('subject');

        $subject = explode(',',$clinical_subject); 
      
        for($indx=0; $indx<count($subject); $indx++) {
            for($sec_indx = 0; $sec_indx<count($subject_list); $sec_indx++) {
                if($subject[$indx] == $subject_list[$sec_indx]['id']) {
                    $subject_list[$sec_indx]['checked'] = "checked";
                } 
            }
        }
        return $subject_list;
    }


}
