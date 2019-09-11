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
         $request->validate([
             'title' => 'required',
             'location'=>'required',
             'photo'=>'required',
        //     'user_id'=>'required',
        //     'recordstatus'=>'required',

         ]);

        $imageName = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('upload/advertisement'), $imageName);
        $ads = new Advertisement([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location'=>$request->input('location'),
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
        if(is_object($request->photo)) {
            $imageName = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('upload/advertisement/'), $imageName);
        } else {
            $imageName = $request->photo;
        }
          $uploadData = array(
              'title' => $request->input('title'),
              'description' => $request->input('description'),
              'location'=>$request->input('location'),
              'photo' => $imageName,
              'user_id' => 1,
              'recordstatus' => 2
         );
          $ads = Advertisement::find($id);
          if(is_object($request->photo)) {
            $file= $ads->photo;
           $filename = public_path().'/upload/advertisement/'.$file;
           \File::delete($filename);
          }
          $ads->update($uploadData);
          return response()->json(' Successfully updated');

    }

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

    public function search(Request $request)
    {
        $request = $request->all();

        $search_word = $request['search_word'];
        $search_categories = Advertisement::query()
                            ->where('title', 'LIKE', "%{$search_word}%")
                            ->orwhere('description', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $search_categories;

    }
}
