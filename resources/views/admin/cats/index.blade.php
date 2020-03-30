@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>Categories</h6>
<a class="btn btn-primary" href="{{ route('admin.cats.create') }}" role="button">Add New</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)

            <tr class="table-light">
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $cat->name }}</td>
            <td>
                <div class="d-flex justify-content-around">

                    <a class="btn btn-info" href="{{ route('admin.cats.edit' , $cat->id) }}" role="button">Edit</a>
                    <form class="inline-flex" action="{{ route('admin.cats.destroy',$cat->id) }}" method="post">
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
