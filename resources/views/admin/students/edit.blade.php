@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h6>Student /Edit {{$student->name}} </h6>
    <a class="btn btn-primary" href="{{ route('admin.students.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

<form method="POST" action="{{ route('admin.students.update',$student->id) }}">
        @csrf
        @method('patch')

        <div class="form-group">
          <label for="editcat">Edit Category</label>
        <input type="text" class="form-control" id="editcat" name="name" value="{{$student->name ?? old('name')}}">
        </div>

        <div class="form-group">
          <label for="emailcat">Edit Email</label>
        <input type="email" class="form-control" id="emailcat" name="email" value="{{$student->email ?? old('email')}}">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>

      </form>




@endsection
