<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all()->toArray();
        return response()->json($cats);
    }

    public function getPosts($cat_id)
    {
        $posts = Post::where("category_id",$cat_id)->orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function getLatestPost($cat_id)
    {
        $latest_post = Post::where("category_id",$cat_id)->orderBy('created_at', 'desc')->first();
        return response()->json($latest_post);
    }

    public function getLatestPostFromAllCat()
    {
        $latest_post_all_cat = Post::orderBy('created_at', 'desc')->limit('4')->get();
        return response()->json($latest_post_all_cat);
    }
}
