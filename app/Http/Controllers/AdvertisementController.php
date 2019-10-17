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
             'title' => 'required|unique:advertisements',
             'location'=>'required',
             'photo'=>'required',
         ]);

        $imageName = $request->photo->getClientOriginalName();
        $imgname = str_replace(' ', '', $imageName);
        // move_uploaded_file($imageName, '/upload/advertisement/'.$imageName);

        $ads = new Advertisement();
        $ads->title = $request->input('title');
        $ads->description = $request->input('description');
        $ads->link=$request->input('link');
        $ads->location=$request->input('location');
        $ads->photo = $imgname;
        $ads->user_id = 1;

         $ads ->save();

         $request->photo->move('./upload/advertisement/', $imgname);
         //return $ads;
         return response()->json('Success ');

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
        $request->validate([
            'title' => 'required',
            'location'=>'required',
            'photo'=>'required',
        ]);

        if(is_object($request->photo)) {
            $imageName = $request->photo->getClientOriginalName();
            $imageName = str_replace(' ', '', $imageName);
            // $request->photo->move(public_path('/upload/advertisement'), $imageName);
            $request->photo->move('./upload/advertisement/', $imageName);
        } else {
            $imageName = $request->photo;
        }
        //   $uploadData = array(
        //       'title' => $request->input('title'),
        //       'description' => $request->input('description'),
        //       'link'=>$request->input('link'),
        //       'location'=>$request->input('location'),
        //       'photo' => $imageName,
        //       'user_id' => 1,
        //       'recordstatus' => 1
        //  );
            $ads = Advertisement::find($id);
            if(is_object($request->photo)) {
                     $file= $ads->photo;
                     $filename = './upload/advertisement/'.$file;
                   \File::delete($filename);
                }

            $ads->title = $request->input('title');
            $ads->description = $request->input('description');
            $ads->link=$request->input('link');
            $ads->location=$request->input('location');
            $ads->photo = $imageName;
            $ads->user_id = 1;
            $ads->save();


        //   if(is_object($request->photo)) {
        //     $file= $ads->photo;
        //     $filename = './upload/advertisement/'.$file;
        //     // $filename = public_path().'/upload/advertisement/'.$file;
        //    \File::delete($filename);
        //   }

            return response()->json('successfully updated');
        //return response()->json($ads);
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
        $filename = './upload/advertisement/'.$file;
        //$filename = public_path().'/upload/advertisement/'.$file;
        \File::delete($filename);
        $ads->delete();
        $advertisements = Advertisement::all()->toArray();
        return array_reverse($advertisements);
        // return response()->json('The successfully deleted');
    }

    public function search(Request $request)
    {
        $request = $request->all();

        $search_word = $request['search_word'];
        $advertisement = Advertisement::query()
                            ->where('title', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $advertisement;

    }
}
