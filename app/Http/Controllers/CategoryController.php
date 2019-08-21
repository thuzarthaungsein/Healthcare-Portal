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

    function __construct()

    {

         $this->middleware('permission:categories-list');

         $this->middleware('permission:categories-create', ['only' => ['create','store']]);

         $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:categories-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $categories = Category::all()->toArray();
        return array_reverse($categories);
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('categories.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        $user = Auth::user()->id;
        request()->validate([
            'name' => 'required',
        ]);

        $categories = new Category;
        $categories->name = $request->name;
        $categories->user_id = $user;
        $categories->recordstatus = 1;
        $categories->save();
        // Category::create($request->all());


        return redirect()->route('categories.index')->with('success','Product created successfully.');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $categories = Category::where('id',$id)->get();
        return view('categories.show',compact('categories'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $categories = Category::where('id',$id)->get();
        return view('categories.edit',compact('categories'));

    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request,$id)

    {


        $user = Auth::user()->id;
        request()->validate([
            'name' => 'required',
        ]);
            $form_data = array(
                'user_id'         =>   $user,
                'name'            =>   $request->name,
                'recordstatus'    =>   1,
            );
        Category::whereId($id)->update($form_data);

        //$product->update($request->all());


        return redirect()->route('categories.index')

                        ->with('success','Product updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->route('categories.index')

                        ->with('success','categories deleted successfully');

    }

}
