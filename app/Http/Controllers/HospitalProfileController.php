<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HospitalProfile;

class HospitalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = value;
        // foreach($test as $test){
        //     $favourite_list = HospitalProfile::where('id',$test)->get();
        // }
        
        // return response()->json(array_reverse($favourite_list));
    }

    public function showFav(Request $request)
    {
        // return response()->json('success data');
       
        // $data = array("aa" => $request);
        
        return response()->json($request
    );
        // $favourite_list = HospitalProfile::whereIn('id',$localFav)->get();
        // return response()->json($str);
    //     $news_list = Post::find($post);
    //     $data = array("news_list" => $news_list);
    //    return response()->json($data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite_list = HospitalProfile::find($id);
        $favourite_list->delete();
        return response()->json('The successfully deleted');
    }
}
