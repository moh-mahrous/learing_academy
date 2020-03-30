@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h6>Students /Add New</h6>
    <a class="btn btn-primary" href="{{ route('admin.students.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

<form method="POST" action="{{ route('admin.students.store') }}">
        @csrf

        <div class="form-group">
        <label for="addstudent">Add New</label>
        <input type="text" class="form-control" id="addstudent" placeholder="add new Students" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
        <label for="email">Add Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>




@endsection
