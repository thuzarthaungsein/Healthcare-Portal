<?php

namespace App\Http\Controllers;

use App\Occupations;
use Illuminate\Http\Request;

class OccupationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupation = Occupations::all()->toArray();
        return $occupation;
    }

    public function typelist()
    {

        $occupation = Occupations::select('id','name')->get()->toArray();

        return $occupation;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getParent()
    {

        $occupationlist = Occupations::select('id','name')->get()->toArray();

        return $occupationlist;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $request->validate([
            'name' => 'required|unique:occupation',


        ]);

        if( $request->parent != null)
        {
           
            $occupation = new Occupations();
            $occupation->name = $request->input('name');
            $occupation->user_id = 1;
            $occupation ->parent = $request->parent;
            $occupation ->recordstatus = 1;

        }
        else if( $request->parent == null)
        {
            
            
            $occupation = new Occupations();
            $occupation->name = $request->input('name');
            $occupation->user_id = 1;
            $occupation ->parent = 0;
            $occupation ->recordstatus = 2;

        }
      
        $occupation->save();

        return $occupation;
    }


    public function show(Type $type)
    {

    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occupations  $occupations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupation = Occupations::find($id);
        return response()->json($occupation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupations  $occupations
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if($request->parent != null)
        {
            $occupation = Occupations::find($id);
            $occupation->name = $request->input('name');
            $occupation->user_id = 1;
            $occupation ->parent = $request->parent;
            $occupation ->recordstatus = 2;
            $occupation->save();
        }
        else{
            $occupation = Occupations::find($id);
            $occupation->name = $request->input('name');
            $occupation->user_id = 1;
            $occupation ->parent = 0;
            $occupation ->recordstatus = 2;
            $occupation->save();
        }
      
    

        return response()->json('The Type successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occupations  $occupations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupation = Occupations::find($id);
        $occupation->delete();
        return response()->json('The Type was successfully deleted');
    }

    public function search(Request $request)
    {
        $request = $request->all();
        $search_word = $request['search_word'];

        $search_occupations = Occupations::query()
                            ->where('name', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $search_occupations;
    }
}
