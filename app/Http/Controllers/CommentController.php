<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailComment;

class CommentController extends Controller
{
    protected $zipcode;
    public function index()
    {
         $comment =Comment::all()->toArray();
         return array_reverse($comment);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        // $request->validate([
        //     'title' => 'required',
        //     'comment' =>'required',
        //     'email' => 'required|email',
        //     'fzipcode' => 'required|numeric',
        //     'lzipcode' => 'required|numeric',
        // ],[
        //     'fzipcode.required' => 'First zipcode is required',
        //     'lzipcode.required' => 'Second zipcode is required'
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

        if($getComment->gender == 0 )
        {
            $getComment->gender = "Male";
        }
        else{
            $getComment->gender = "Female";
        }
        \Mail::to($getComment)->send(new SendMailComment($getComment));

        // return response()->json(['success'=>'Done!']);

    }


    public function show($id)
    {
        //
    }

    public function edit(Comment $comment)
    {

    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy($id)
    {
        //

        $comment = Comment::find($id);
        $comment->delete();
        return response()->json('Comment successfully deleted');
    }
    public function confirm($id)
     {

            $comment =Comment::find($id);
            $comment->status =1;
            $comment->save();
            $comment =Comment::all()->toArray();
            $data = array("comments"=> $comment, "success", "Comment successfully confirmed");
            return response()->json($data);
    }

}
