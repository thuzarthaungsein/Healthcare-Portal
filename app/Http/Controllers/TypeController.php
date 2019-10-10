<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::all()->toArray();
        return $types;
        // return view('typesample');
    }

    public function typelist()
    {

        $typelist = Type::select('id','name')->get()->toArray();

        return response()->json($typelist);
    }

    // public function getParent()
    // {

    //     $typelist = Type::select('id','name')->get()->toArray();

    //     return $typelist;
    // }



    public function create()
    {

    }

    public function store(Request $request)
    {
    
       
        $request->validate([
            'name' => 'required|unique:types',


        ]);
      

        if( $request->parent != null) 
        { 
            $type = new Type();
            $type->name = $request->input('name');
            $type->user_id = 1;
            $type ->parent = $request->parent;
            $type ->recordstatus = 1;
        }
        else if( $request->parent == null)
        {       
            $type = new Type();
            $type->name = $request->input('name');
            $type->user_id = 1;
            $type ->parent = 0;
            $type ->recordstatus = 2;

        }
      
        $type->save();

        return $type;
    }


    public function show(Type $type)
    {

    }


    public function edit($id)
    {
        $type = Type::find($id);
        return response()->json($type);
    }


    public function update($id, Request $request)   
    {
        $request->validate([
            'name' => 'required',
        ]);
        if($request->parent != null)
        {
            $type = Type::find($id);
            $type->name = $request->input('name');
            $type->user_id = 1;
            $type ->parent = $request->parent;
            $type ->recordstatus = 2;
            $type->save();
        }
        else{
            $type = Type::find($id);
            $type->name = $request->input('name');
            $type->user_id = 1;
            $type ->parent = 0;
            $type ->recordstatus = 2;
            $type->save();
        }
      
       
        // $type->update($request->all());

        return response()->json('The Type successfully updated');
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        return response()->json('The Type was successfully deleted');
    }

    public function search(Request $request)
    {
    $request = $request->all();
        $search_word = $request['search_word'];

        $search_categories = Type::query()
                            ->where('name', 'LIKE', "%{$search_word}%")
                            ->get()
                            ->toArray();
        return $search_categories;

    }
}
