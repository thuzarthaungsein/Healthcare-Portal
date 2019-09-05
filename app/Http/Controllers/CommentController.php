<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
 
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {

           
        // $request->validate([
        //     'title' => 'required|unique:jobs',
        //     'comment' =>'required',
        //     'email' => 'required',
        //     'zipcode' => 'required',        
        // ]);
        return $request;

        $comment = new Comment ([

            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
            'email' => $request->input('email'),
            'name' =>  $request->input('name'),
            'year' => $request->input('year'),
            'gender' => $request->input('gender'),
            'zipcode' =>  $request->input('zipcode'),
            'customer_id' => 1,
            'status' => 0,  
            'recordstatus' => 2

        ]);


        $job ->comment();
    }

   
    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    
    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
