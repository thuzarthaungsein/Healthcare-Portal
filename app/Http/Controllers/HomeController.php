<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use DB;

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

    public function home()
    {
        // $cats = Category::all()->toArray();
        return view("home");
    }

    public function getPosts(Request $request)
    {
        $request = $request->all();
        $cat_id = $request['category_id'];

        $posts = Post::where("category_id",$cat_id);
        if(isset($request['search_word'])) {
            $search_word = $request['search_word'];
            $posts = $posts->where(function($qu) use ($search_word){
                $qu->where('title', 'LIKE', "%{$search_word}%");
            });
        }
        $posts = $posts->orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function getLatestPost(Request $request)
    {
        // $latest_post = Post::where("category_id",$cat_id)->orderBy('created_at', 'desc')->first();
        $request = $request->all();
        $cat_id = $request['category_id'];

        $latest_post = Post::where("category_id",$cat_id);
        // $search_word = $request['search_word'];

        if(isset($request['search_word'])) {
            $search_word = $request['search_word'];
            $latest_post = $latest_post->where(function($qu) use ($search_word){
                $qu->where('title', 'LIKE', "%{$search_word}%");
            });
        }
        $latest_post = $latest_post->orderBy('created_at', 'desc')->first();
        return response()->json($latest_post);
    }


        public function getLatestPostFromAllCat()
    {
        $latest_post_all_cat = Post::orderBy('created_at', 'desc')->limit('4')->get();
        return response()->json($latest_post_all_cat);
    }


    public function search(Request $request)
    {
        $request = $request->all();
        $category_id = $request['selected_category'];

        $query = Post::query()
                    ->where('category_id', $category_id);

        if(isset($request['search_word'])) {
            $search_word = $request['search_word'];

            $query = $query->where(function($qu) use ($search_word){
                            $qu->where('title', 'LIKE', "%{$search_word}%");
                        });
        }
        $query = $query->orderBy('created_at','DESC')
                        ->get()
                        ->toArray();
        return $query;
    }

    public function getLatestPostsByAllCatId() {
        $posts = Category::join('posts', 'categories.id', '=', 'posts.category_id')

                        ->selectRaw('GROUP_CONCAT(posts.title order by posts.created_at desc limit 6) as title')
                        ->selectRaw('GROUP_CONCAT(posts.photo order by posts.created_at desc limit 6) as photo')
                        ->selectRaw('GROUP_CONCAT(posts.id order by posts.created_at desc limit 6) as post_id')
                        ->groupBy('categories.id')
                        ->get()
                        ->toArray();
        // $sql = "select c.name , c.id, group_concat(p.title  order by p.created_at desc limit 6) as title, group_concat(p.photo order by p.created_at desc limit 4) as photo from categories c join posts p
        // where c.id = p.category_id group by c.id";
        // $posts = DB::select($sql);
        return $posts;
    }
}
