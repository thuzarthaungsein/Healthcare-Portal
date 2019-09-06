<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ads =Advertisement::all()->toArray();
        return array_reverse($ads);
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

        $imageName = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('upload/advertisement'), $imageName);
        $ads = new Advertisement([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            //'location'=>$adstring,
            'location'=>$request->input('location'),
             //'photo' =>$request->input('photo'),
            //'location' =>implode("," , $request->input('location')),
            'photo' => $request->photo->getClientOriginalName(),
            'user_id' => 1,
            'recordstatus' => 2
        ]);
         $ads ->save();
         //return $ads;
         return response()->json('Successfully ');

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
         $ads = Advertisement::find($id);

         return response()->json($ads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $imageName = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('upload/advertisement/'), $imageName);
          $uploadData = array(
              'title' => $request->input('title'),
              'description' => $request->input('description'),
              'photo' => $request->photo->getClientOriginalName(),
              'user_id' => 1,
              'recordstatus' => 2
         );
          $ads = Advertisement::find($id);
          $ads->update($uploadData);
          return response()->json(' Successfully updated');

    }
    // public function updatedele($id){
    //     $ads = Advertisement::find($id);
    //     if(Input::hasFile('photo')){
    //         $file = Input::file('photo');
    //         $name = time() . '-' . $file->getClientOriginalName();
    //         $file = $file->move(public_path() . 'upload/advertisement/', $name);
    //         $ads->file= $name;
    //     }
    //     $ads->save();
    //     return "success";

    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ads = Advertisement::find($id);
        $file= $ads->photo;
        $filename = public_path().'/upload/advertisement/'.$file;
        \File::delete($filename);
        $ads->delete();
        return response()->json('The successfully deleted');
    }
}
