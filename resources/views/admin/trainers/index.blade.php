@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h5>trainers</h5>
<a class="btn btn-primary" href="{{ route('admin.trainers.create') }}" role="button">Add New</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">spec</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $trainer)

            <tr class="table-light">
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $trainer->name }}</td>
            <td>{{ $trainer->spec }}</td>
            <td>
                <div  class="d-flex justify-content-around">

                    <a class="btn btn-primary" href="{{ route('admin.trainers.show' , $trainer->id) }}" role="button">Show</a>
                    <a class="btn btn-info" href="{{ route('admin.trainers.edit' , $trainer->id) }}" role="button">Edit</a>
                    
                    <form action="{{ route('admin.trainers.destroy',$trainer->id) }}" method="post">
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
