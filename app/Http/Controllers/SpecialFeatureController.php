<?php

namespace App\Http\Controllers;
use App\special_feature;
use App\NursingProfile;
use App\HospitalProfile;
use Illuminate\Http\Request;
use DB;

class SpecialFeatureController extends Controller
{

    public function index()
    {
        $feature = special_feature::all()->toArray();
        return array_reverse($feature);
    }


    public function create()
    {

    }

    public function getFeaturebyProfileType($profile_type,$customer_id) {
        $cooperate_list = special_feature::where('type','=',$profile_type)->get()->toArray();

        if($profile_type == 'nursing') {
            $profile_feature = NursingProfile::where('customer_id','=',$customer_id)->value('special_features');
        }
        if($profile_type == 'hospital') {
            $profile_feature = HospitalProfile::where('customer_id','=',$customer_id)->value('special_features');
        }
        
        $feature = explode(',',$profile_feature); 
      
        for($indx=0; $indx<count($feature); $indx++) {
            for($sec_indx = 0; $sec_indx<count($cooperate_list); $sec_indx++) {
                if($feature[$indx] == $cooperate_list[$sec_indx]['id']) {
                    $cooperate_list[$sec_indx]['checked'] = "checked";
                } 
            }
        }

        return $cooperate_list;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'short_name'=>'required',
            'type.required' => '選択してください。',

        ]);

        $feature = new special_feature;
        $feature->name=$request->name;
        $feature->short_name=$request->short_name;
        $feature->type=$request->type;
        $feature->user_id=1;
        $feature->recordstatus=1;
        $feature ->save();
        return $feature;
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $feature = special_feature::find($id);
        return response()->json($feature);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $feature = special_feature::find($id);

        $feature->name = $request->name;
        $feature->short_name = $request->short_name;
        $feature->type = $request->type;
        $feature->user_id = 1;
        $feature->save();

        return response()->json('The Feature successfully updated');
    }


    public function destroy($id)
    {
        $feature = special_feature::find($id);
        $feature->delete();
        return response()->json('The Feature successfully deleted');
    }

    public function search(Request $request)
    {
        $request = $request->all();
        $search_word = $request['search_word'];

        $special_feature = special_feature::query()
                            ->where('name', 'LIKE', "%{$search_word}%")
                            ->orwhere('short_name', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $special_feature;
    }
}
