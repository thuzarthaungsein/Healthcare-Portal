<?php

namespace App\Http\Controllers;

use App\NursingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\nursingMailing;
use App\Mail\userNursingMail;
class NursingMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function mail(Request $request){
        // $favourite_name = $request->fav_name;
        // return $favourite_name[1];
      
    //    for($i = 1;$i< count($request->arr_reserve) ;$i++)
    //    {
    //        if($request->arr_reserve[$i] == true)
    //        {
    //            return 'true';
    //        }else{
    //            return 'false';
    //        }
    //    }
        // if($request->arr_reserve[0])
        // {
        //     $request->arr_reserve[1] = "sample";
        // }
        // else{
        //     $request->arr_reserve[1] = "no result";
        // }
        // return $request;
        $favourite_mail = $request->fav_mail;
        $favourite_id = $request->fav_id;
        $favourite_name = $request->fav_name;
        $fav_reserve = $request->arr_reserve;
        $fav_documentation = $request->arr_document;

         for($i = 1; $i<count($favourite_id); $i++){
            
            $request->fav_id = $favourite_id[$i];
          
           \Mail::to($favourite_mail[$i])->send(new nursingMailing($request));

        // \Mail::to('hero2012.zk@gmail.com')->send(new nursingMailing($request));
    
    }
        \Mail::to($request->mail)->send(new userNursingMail($favourite_name));

        return response()->json(['success'=>'Done!']);
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NursingMail  $nursingMail
     * @return \Illuminate\Http\Response
     */
    public function show(NursingMail $nursingMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NursingMail  $nursingMail
     * @return \Illuminate\Http\Response
     */
    public function edit(NursingMail $nursingMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NursingMail  $nursingMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NursingMail $nursingMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NursingMail  $nursingMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(NursingMail $nursingMail)
    {
        //
    }
}