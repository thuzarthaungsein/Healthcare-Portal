<?php

namespace App\Http\Controllers;

use App\Station;
use Auth;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stations = Station::all()->toArray();
        return array_reverse($stations);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',

        ],
        [
            'name.unique' => 'Unique Name'
        ]
    );

        $station = new Station();
        $station->name = $request->input('name');
        $station->user_id = 1;
        $station->recordstatus = 1;

        $station->save();
        return $station;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);
        return response()->json($station);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $station = Station::find($id);
        $station->name = $request->input('name');
        $station->user_id = 1;
        $station->recordstatus = 1;
        $station -> save();

        return response()->json('The Station successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        return response()->json('The Station successfully deleted');
    }

    public function search(Request $request) {
        $request = $request->all();
        $search_word = $request['search_word'];

        $search_stations = Station::query()
                            ->where('name', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $search_stations;
    }
}
