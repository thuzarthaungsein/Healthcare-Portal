<?php

namespace App\Http\Controllers;

use App\Facility;
use App\NursingProfile;
use App\HospitalProfile;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
   
    public function index()
    {
        $facilities = Facility::all()->toArray();
        return array_reverse($facilities);
    }

    //add facility
    public function add(Request $request)
    {
        $request->validate([
            'description' => 'required|unique:facilities',
      
        ]);
    
        $facility = new Facility();
        $facility->description = $request->input('description');
        $facility->save();
        return response()->json('The Facility successfully added');
          
        
 
    }




    public function store(Request $request)
    {
        
    }

 
    public function show(Facility $facility)
    {
        
    }

   
    public function edit($id)
    {
        $facility = Facility::find($id);
        return response()->json($facility);
    }

   
    public function update($id, Request $request)
    {
        $request->validate([
            'description' => 'required',
      
        ]);
        $facility = Facility::find($id);
        $facility->description =$request->input('description');
        $facility->save();
        
        
        return response()->json('The Facility successfully updated');
    }

  
    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->delete();
        return response()->json('The Facility successfully deleted');
    }

    public function search(Request $request)
    {
        $request = $request->all();
        $search_word = $request['search_word'];
        
        $search_facilities = Facility::query()
                            ->where('description', 'LIKE', "%{$search_word}%") 
                            ->get()
                            ->toArray();
        return $search_facilities;
    }

    public function getFacilitybyProfileType($profile_type,$customer_id) {
        $facility_list = Facility::all()->toArray();

        if($profile_type == 'nursing') {
            $profile_facility = NursingProfile::where('customer_id','=',$customer_id)->value('facilities');
        }
        if($profile_type == 'hospital') {
            $profile_facility = HospitalProfile::where('customer_id','=',$customer_id)->value('facilities');
        }
        
        $facility = explode(',',$profile_facility); 
      
        for($indx=0; $indx<count($facility); $indx++) {
            for($sec_indx = 0; $sec_indx<count($facility_list); $sec_indx++) {
                if($facility[$indx] == $facility_list[$sec_indx]['id']) {
                    $facility_list[$sec_indx]['checked'] = "checked";
                } 
            }
        }

        // print_r($facility_list);

        return $facility_list;
    }
}
