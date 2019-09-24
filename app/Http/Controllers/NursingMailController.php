<?php

namespace App\Http\Controllers;

use App\NursingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\nursingMailing;

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
      
       for($i = 1;$i< count($request->arr_reserve) ;$i++)
       {
           if($request->arr_reserve[$i] == true)
           {
               return 'true';
           }else{
               return 'false';
           }
       }
        // if($request->arr_reserve[0])
        // {
        //     $request->arr_reserve[1] = "sample";
        // }
        // else{
        //     $request->arr_reserve[1] = "no result";
        // }
        return $request;
        // $favourite_mail = $request->fav_mail;
        // for($i = 1; $i<count($favourite_mail); $i++){
        //     \Mail::to($favourite_mail[$i])->send(new nursingMailing($request));
        // }
        // \Mail::to($request->mail)->send(new nursingMailing($request));

        // return response()->json(['success'=>'Done!']);
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