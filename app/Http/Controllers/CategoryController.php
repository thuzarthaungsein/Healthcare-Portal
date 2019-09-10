<?php


namespace App\Http\Controllers;

use App\Category;
use Auth;
use Illuminate\Http\Request;


class CategoryController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    // function __construct()

    // {

    //      $this->middleware('permission:categories-list');

    //      $this->middleware('permission:categories-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:categories-delete', ['only' => ['destroy']]);

    // }


    //index category
    public function index()
    {
        $categories = Category::all()->toArray();
        return array_reverse($categories);
    }
    public function list()
    {
       
        $category_list = Category::select('id','name')->get()->toArray(); 
        return response()->json($category_list);

    }

    //add category
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
      
        ]);

        $category = new Category([
            'name' => $request->input('name'),
            'user_id' => 1,
            'recordstatus' => 2
        ]);
        $category ->save();
        return $category;

    }

    public function edit($id)
    {
      
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
      
        ]);
        $category = Category::find($id);
        $category->update($request->all());

        return response()->json('The Facility successfully updated');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json('The Category successfully deleted');
    }
    public function create()

    {
        return view('categories.create');
    }

    public function search(Request $request) 
    {
        $request = $request->all();
        $search_word = $request['search_word'];
        
        $search_categories = Category::query()
                            ->where('name', 'LIKE', "%{$search_word}%")
                            ->orderBy('id','DESC')
                            ->get()
                            ->toArray();
        return $search_categories;
        
    }

    // public function store(Request $request)
    // {
    //     $user = Auth::user()->id;
    //     request()->validate([
    //         'name' => 'required',
    //     ]);

    //     $categories = new Category;
    //     $categories->name = $request->name;
    //     $categories->user_id = $user;
    //     $categories->recordstatus = 1;
    //     $categories->save();
    //     // Category::create($request->all());


    //     return redirect()->route('categories.index')->with('success','Product created successfully.');

    // }



    // public function show($id)

    // {
    //     $categories = Category::where('id',$id)->get();
    //     return view('categories.show',compact('categories'));

    // }



    // public function edit($id)

    // {
    //     $categories = Category::where('id',$id)->get();
    //     return view('categories.edit',compact('categories'));

    // }

        // $user = Auth::user()->id;
        // request()->validate([
        //     'name' => 'required',
        // ]);
        //     $form_data = array(
        //         'user_id'         =>   $user,
        //         'name'            =>   $request->name,
        //         'recordstatus'    =>   1,
        //     );
        // Category::whereId($id)->update($form_data);

        //$product->update($request->all());


    // public function update(Request $request,$id)

    // {


    //     $user = Auth::user()->id;
    //     request()->validate([
    //         'name' => 'required',
    //     ]);
    //         $form_data = array(
    //             'user_id'         =>   $user,
    //             'name'            =>   $request->name,
    //             'recordstatus'    =>   1,
    //         );
    //     Category::whereId($id)->update($form_data);

    //     //$product->update($request->all());


    //     return redirect()->route('categories.index')

    //                     ->with('success','Product updated successfully');

    // }



    // public function destroy($id)

    // {
    //     $data = Category::findOrFail($id);
    //     $data->delete();
    //     return redirect()->route('categories.index')

    //                     ->with('success','categories deleted successfully');

    // }
}
