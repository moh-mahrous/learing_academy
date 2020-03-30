@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Students</h6>
<a class="btn btn-primary" href="{{ route('admin.students.create') }}" role="button">Add New</a>
</div>
<div class= "d-flex justify-content-center w-100 mb-5">


    {{ $students->links() }}

</div>

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)

            <tr class="table-light">
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <div class="d-flex justify-content-around">

                    <a class="btn btn-info" href="{{ route('admin.students.edit' , $student->id) }}" role="button">Edit</a>

                    <a class="btn btn-primary" href="{{ route('admin.students.showCourses' , $student->id) }}" role="button">Show Courses</a>

                    <form class="inline-flex" action="{{ route('admin.students.destroy',$student->id) }}" method="post">
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
