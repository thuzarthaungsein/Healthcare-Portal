<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Customer;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailComment;

class CommentController extends Controller
{
    protected $zipcode;
    public function index()
    {
        // $comment =Comment::all()->toArray();
        // return array_reverse($comment);
        $sql = "SELECT comments.*,customers.name from comments JOIN customers ON comments.customer_id= customers.id";
        $commentList = DB::select($sql);
        foreach ($commentList as $com) {
            $splitTimeStamp = explode(" ",$com->created_at);
            $com->created_date = $splitTimeStamp[0];
            $com->created_time = $splitTimeStamp[1];
        }
        // return $comments;
        return $commentList;
    }


    public function create()
    {
        //
    }
    // public function getCommentList($cusid){

    //     // $sql = "SELECT comments.*,customers.id,customers.name from comments JOIN customers ON comments.customer_id= customers.id WHERE comments.customer_id=$cusid";
    //     // $commentList = DB::select($sql);
    //     // return $commentList;
    // }

    public function store(Request $request)
    {

        // $request->validate([
        //     'title' => 'required',
        //     'comment' =>'required',
        //     'email' => 'required|email',
            //  'fzipcode' => 'required',
            //  'lzipcode' => 'required',
        // ]
        // ,[
        //     'fzipcode.required' => 'First zipcode is required and must be three !',
        //     'lzipcode.required' => 'Second zipcode is required and  must be four'
        // ]
    // );

        // $request->validate([
        //     'title' => 'required',
        //     'comment' =>'required',
        //     'email' => 'required|email',

        // ]);

        $zipcode =  $request->fields[0]['fzipcode'] . '-' . $request->fields[0]['lzipcode'];


        $comment = new Comment();
        $comment->title = $request->input('title');
        $comment->comment = $request->input('comment');
        $comment->email = $request->input('email');
        $comment->name =  $request->input('name');
        $comment->year = $request->input('year');
        $comment->gender = $request->input('gender');
        $comment->zipcode = $zipcode;
        $comment->customer_id = $request->customer_id;
        $comment->status = 0;
        $comment->recordstatus = 1;
        $comment ->save();


        $getComment = Comment::findOrFail($comment->id);
        $query = "SELECT cu.id as cusid ,cu.name as cusname,co.* from customers As cu  Join comments As co on cu.id = co.customer_id  where co.customer_id =" . $comment->customer_id . " and co.id =" .$comment->id;
        $getComment = DB::select($query);

        if($getComment[0]->gender == 0 )
        {
            $getComment[0]->gender = "Male";
        }
        else{
            $getComment[0]->gender = "Female";
        }
        // \Mail::to('mayphue17@management-part')->send(new SendMailComment($getComment));
        \Mail::to($getComment[0]->email)->send(new SendMailComment($getComment));

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
        $comments = Comment::all()->toArray();
        return array_reverse($comments);
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

    public function list()
    {

        $comment_list = Comment::select('id','title')->get()->toArray();
        return response()->json($comment_list);

    }

    public function search(Request $request) {
        $request = $request->all();
        $search_word = $request['search_word'];

        $search_comment = DB::table('comments') 
                            ->join('customers','comments.customer_id','=','customers.id')
                            ->where('customers.name', 'LIKE', "%{$search_word}%")
                            ->orderBy('comments.id','DESC')
                            ->get()
                            ->toArray();
        return $search_comment;

    }

}
