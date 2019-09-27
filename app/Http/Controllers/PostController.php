<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostView;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role-list');
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {

       $news_list = Post::all()->toArray();
       return response()->json(array_reverse($news_list));

    }
    // add news
    public function add(Request $request)
    {
        // return $request->input('related_news');
        $request->validate([
            'title' => 'required',
            'main_point' => 'required',
            'category_id' => 'required',
            'related_news' => 'required',
            'body' => 'required',
        ],[
            'title.required' => 'ニュースの題名が必須です。',
            'main_point.required' => 'ニュースの主な情報が必須です。',
            'category_id.required' => 'ニュースのカテゴリーが必須です。',
            'related_news.required' => 'ニュースのカテゴリーが必須です。',
            'body.required' => 'ニュースの内容が必須です。',
        ]);

        if($request->image != null && $request->image != "")
        {
            $imageName = $request->image->getClientOriginalName();
            // $request->image->move(public_path('/upload/news'), $imageName);

            $imageName = str_replace(' ', '', $imageName);
            $request->photo->move('upload/news/', $imageName);

            $post = new Post([
                'title' => $request->input('title'),
                'main_point' => $request->input('main_point'),
                'body' => $request->input('body'),
                'photo' =>$imageName,
                'category_id' =>$request->input('category_id'),
                'related_news' =>$request->input('related_news'),
                'user_id' => 1,
                'recordstatus' => 1
            ]);
        }
        else{
            $post = new Post([
                'title' => $request->input('title'),
                'main_point' => $request->input('main_point'),
                'body' => $request->input('body'),
                'category_id' =>$request->input('category_id'),
                'related_news' =>$request->input('related_news'),
                'user_id' => 1,
                'recordstatus' => 1
            ]);
        }
        $post->save();

        // return response()->json('The New successfully added');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);

    }
    public function show_related($id) {

        $related_news = Post::select('related_news','category_id')->where('id',$id)->get();
        if($related_news[0]["related_news"] != null) {
            $sql = "select * from posts where id in(".$related_news[0]["related_news"].")";
            $news = DB::select($sql);
            }
        else{
            $news = null;
        }

        $latest = Post::select('*')->where('category_id',$related_news[0]["category_id"])->orderBy('created_at','DESC')->limit('5')->get();

        $data = array("related_news"=>$news, "latest_news" => $latest);
        return $data;

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'main_point' => 'required',
            'category_id' => 'required',
            'related_news' => 'required',
            'body' => 'required',
        ],[
            'title.required' => 'ニュースの題名が必須です。',
            'main_point.required' => 'ニュースの主な情報が必須です。',
            'category_id.required' => 'ニュースのカテゴリーが必須です。',
            'related_news.required' => 'ニュースのカテゴリーが必須です。',
            'body.required' => 'ニュースの内容が必須です。',
        ]);
        if(is_object($request->photo)){
            $imageName = $request->photo->getClientOriginalName();
            // $request->photo->move(public_path('/upload/news'), $imageName);
            $imageName = str_replace(' ', '', $imageName);
            $request->photo->move('upload/news/', $imageName);
        }else {
            $imageName =$request->photo;
        }

        $formData = array(
            'title' => $request->input('title'),
            'main_point' => $request->input('main_point'),
            'body' => $request->input('body'),
            'photo' => $imageName,
            'category_id' =>$request->input('category_id'),
            'related_news' =>$request->input('related_news'),
            'user_id' => 1,
            'recordstatus' => 1
        );
        $post = Post::find($id);
        if(is_object($request->photo)){
            $file= $post->photo;
            $filename = '/upload/news/'.$file;
            \File::delete($filename);
        }
        $post->update($formData);
        return response()->json('The news successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $file= $post->photo;
        $filename = '/upload/news/'.$file;
        \File::delete($filename);
        $post->delete();
        return response()->json('The news post successfully deleted');
    }

    public function search(Request $request)
    {
        $request = $request->all();

        $query = Post::query();

        if(isset($request['selected_category'])) {
            $category_id = $request['selected_category'];
            $query = $query->where('category_id', $category_id);
        }

        if(isset($request['search_word'])) {
            $search_word = $request['search_word'];

            $query = $query->where(function($qu) use ($search_word){
                            $qu->where('title', 'LIKE', "%{$search_word}%")
                                ->orWhere('main_point', 'LIKE', "%{$search_word}%");
                        });
        }
        $query = $query->orderBy('id','DESC')
                        ->get();
        return $query;
    }

    public function getPostById($cat_id) {
        $posts = Post::where("category_id",$cat_id)->orderBy('created_at','DESC')->get();
        return $posts;
    }

}
