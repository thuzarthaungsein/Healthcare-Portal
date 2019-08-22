@extends('layouts.admin')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Products</h2>

            </div>

            <div class="pull-right">

                @can('categories-create')

                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Product</a>

                @endcan

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th> 

            <th>Name</th>
       
            <th>User Id</th>
            <th>Record status</th>
      
            <th>Action</th>

        </tr>

	    @foreach ($categories as $categories)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $categories->name }}</td>
          
	        <td>{{ $categories->user_id }}</td>
            <td>{{ $categories->recordstatus }}</td>
          
	        <td>

                <form action="{{ route('categories.destroy',$categories->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('categories.show',$categories->id) }}">Show</a>

                    @can('categories-edit')

                    <a class="btn btn-primary" href="{{ route('categories.edit',$categories->id) }}">Edit</a>

                    @endcan


                    @csrf

                    @method('DELETE')

                    @can('categories-delete')

                    <button type="submit" class="btn btn-danger">Delete</button>

                    @endcan

                </form>

	        </td>

	    </tr>

	    @endforeach

    </table>





@endsection