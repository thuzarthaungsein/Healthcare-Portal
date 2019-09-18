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

        return $typelist;
    }

    public function getParent()
    {

        $typelist = Type::select('id','name')->get()->toArray();

        return $typelist;
    }



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
            $type = new Type ([
                'name' => $request->input('name'),
                'user_id' => 1,
                'parent' => $request->parent,
                'recordstatus' => 2
            ]);

        }
        else if( $request->parent == null)
        {

            $type = new Type ([
                'name' => $request->input('name'),
                'user_id' => 1,
                'parent' => 0,
                'recordstatus' => 2
            ]);

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
        $type = Type::find($id);
        $type->update($request->all());

        return response()->json('The Type successfully updated');
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        return response()->json('The Type was successfully deleted');
    }


}
