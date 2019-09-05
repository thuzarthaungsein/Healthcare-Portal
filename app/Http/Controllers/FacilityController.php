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
        $request->validate([
            'description' => 'required|unique:facilities',
      
        ]);
        
        $facility = new Facility([
            'description' => $request->input('description')
        ]);
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
        $facility->update($request->all());
        
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
}
