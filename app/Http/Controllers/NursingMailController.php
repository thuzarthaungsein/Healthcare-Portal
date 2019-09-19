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
        $favourite_mail = $request->fav_mail;
        for($i = 1; $i<count($favourite_mail); $i++){
            \Mail::to($favourite_mail[$i])->send(new nursingMailing($request));
        }
        \Mail::to($request->mail)->send(new nursingMailing($request));

        return response()->json(['success'=>'Done!']);
    }

//     public function confirm($id)
//     {

//            $nursemail =Nurse::find($id);
//            $nursemail->status =1;
//            $nursemail->save();
//            $nursemail =Nurse::all()->toArray();
//            $data = array("comments"=> $nursemail, "success", "Comment successfully confirmed");
//            return response()->json($data);
//    }
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
