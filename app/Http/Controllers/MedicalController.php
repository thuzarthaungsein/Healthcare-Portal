<?php

namespace App\Http\Controllers;

use App\Medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical = Medical::all()->toArray();
        return array_reverse($medical);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function show(Medical $medical)
    {
        //
    }

    public function add(Request $request)
    {

        $medical = new Medical([
            'name' => $request->input('name'),
            'user_id' => 1,
            // 'recordstatus' => 2
        ]);
        $medical->save();
        // return $request;
        // if($request != null && $request != "")
        // {
        //     $medical = new Medical([
        //         'name' => $request->input('name'),
        //         'user_id' => $request->input('user_id'),
        //         'recordstatus' => $request->input('recordstatus')
        //     ]);
        //     $medical->save();
        //     return response()->json('medicalacceptance successfully added');
          
        // }
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical = Medical::find($id);
        return response()->json($medical);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $medical = Medical::find($id);
        $medical->update($request->all());

        return response()->json('Medicalacceptancelist successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medical = Medical::find($id);
        $medical->delete();
        return response()->json('Medicalacceptancelist successfully deleted');
    }
}
