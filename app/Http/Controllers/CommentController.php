<?php

namespace App\Http\Controllers;
 
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailComment;

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
        //     'email' => 'required|email|unique:comments',
        //     'zipcode' => 'required',        
        // ]);

        $zipcode =  $request->fields[0]['fzipcode'] . '-' . $request->fields[0]['lzipcode'];

        $comment = new Comment ([

            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
            'email' => $request->input('email'),
            'name' =>  $request->input('name'),
            'year' => $request->input('year'),
            'gender' => $request->input('gender'),
            'zipcode' =>  $zipcode,
            'customer_id' => 1,
            'status' => 0,  
            'recordstatus' => 2
            
        ]);
        $comment ->save();
        $getComment = Comment::findOrFail($comment->id);
        \Mail::to($getComment)->send(new SendMailComment($getComment));

        return response()->json(['success'=>'Done!']);

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
