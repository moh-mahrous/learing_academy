@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h5>courses</h5>
<a class="btn btn-primary" href="{{ route('admin.courses.create') }}" role="button">Add New</a>
</div>

<div class= "d-flex justify-content-center w-100 mb-5">

    {{ $courses->links() }}

    </div>

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)

            <tr class="table-light">
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $course->name }}</td>
            <td>{{ "$".$course->price }}</td>
            <td>
                <div  class="d-flex justify-content-around">

                    <a class="btn btn-primary" href="{{ route('admin.courses.show' , $course->id) }}" role="button">Show</a>

                    <a class="btn btn-info" href="{{ route('admin.courses.edit' , $course->id) }}" role="button">Edit</a>

                    <form action="{{ route('admin.courses.destroy',$course->id) }}" method="post">

                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </div>
            </td>
            </tr>



        @endforeach





    </tbody>
  </table>



@endsection
