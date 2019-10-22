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
        // if(isset($request['search_word'])) {
        //     $search_word = $request['search_word'];
        //     $posts = $posts->where(function($qu) use ($search_word){
        //         $qu->where('title', 'LIKE', "%{$search_word}%");
        //     });
        // }
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

        // if(isset($request['search_word'])) {
        //     $search_word = $request['search_word'];
        //     $latest_post = $latest_post->where(function($qu) use ($search_word){
        //         $qu->where('title', 'LIKE', "%{$search_word}%");
        //     });
        // }
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

    public function getLatestPostsByAllCatId($search_word) {
        // $posts = Category::join('posts', 'categories.id', '=', 'posts.category_id')
        //                 ->selectRaw('GROUP_CONCAT(posts.title order by posts.created_at desc limit 6) as title')
        //                 ->selectRaw('GROUP_CONCAT(posts.photo order by posts.created_at desc limit 6) as photo')
        //                 ->selectRaw('GROUP_CONCAT(posts.id order by posts.created_at desc limit 6) as post_id')
        //                 ->groupBy('categories.id')
        //                 ->get()
        //                 ->toArray();         
        // $sql = "select c.name , c.id, group_concat(p.title  order by p.created_at desc limit 6) as title, group_concat(p.photo order by p.created_at desc limit 4) as photo ,group_concat(p.id order by p.created_at desc limit 6) as post_id from categories AS c INNER join posts AS p on c.id = p.category_id group by c.id";
        // $sql = "SELECT categories.name,categories.id,posts.id as pid,posts.title,posts.created_at, posts.photo, posts.main_point FROM categories INNER JOIN posts ON categories.id = posts.category_id order by posts.created_at desc LIMIT 100";
        // $sql = "SELECT categories.name,categories.id,posts.id as pid,posts.title,posts.created_at, posts.photo, posts.main_point FROM categories INNER JOIN posts ON categories.id = posts.category_id WHERE posts.created_at > date_sub(now(), interval 1 month) order by posts.created_at desc";
        
        $sql = "";
        if($search_word == 'all_news_search'){
            $wh = '';
        }
        else{
            $wh = " AND (posts.title LIKe '%{$search_word}%' OR posts.main_point LIKe '%{$search_word}%' OR posts.body LIKe '%{$search_word}%')";
        }

        $cat = Category::select('id')->get();
        for($i = 0; $i < count($cat); $i++) {
            $sql.= "(SELECT categories.name,categories.id,posts.id as pid,posts.title,posts.created_at, posts.photo, posts.main_point FROM categories INNER JOIN posts ON categories.id = posts.category_id WHERE categories.id = ".$cat[$i]['id']." ".$wh." order by posts.created_at desc LIMIT 10) UNION "; 
        }

        $sql = trim($sql,' UNION ');
        
        $posts = DB::select($sql);
        return $posts;
    }
}

