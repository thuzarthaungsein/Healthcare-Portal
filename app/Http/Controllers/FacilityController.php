<?php

namespace App\Http\Controllers;

use App\Facility;
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
        if($request != null && $request != "")
        {
            $facility = new Facility([
                'description' => $request->input('description')
            ]);
            $facility->save();
            return response()->json('The Facility successfully added');
          
        }
 
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
        $facility = Facility::find($id);
        $facility->update($request->all());
        
        return response()->json('The Facility successfully updated');
    }

  
    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->delete();
        return response()->json('The Facility successfully deleted');
    }
}
