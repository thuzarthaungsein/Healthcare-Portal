<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        return view('typesample');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

          $validater =   $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'parent' => 'required',
            ]);

            if($validater->passess())
            {
               
            }

            $type = new Type ([

                'title' => $request->input('title'),
                'user_id' => 1,
                'recordstatus' => 2
    
            ]);
        return $request;
    }

  
    public function show(Type $type)
    {
        //
    }

   
    public function edit(Type $type)
    {
        //
    }


    public function update(Request $request, Type $type)
    {
        //
    }


    public function destroy(Type $type)
    {
        //
    }
}
