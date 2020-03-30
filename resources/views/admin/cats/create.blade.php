@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h6>Categories /Add New</h6>
    <a class="btn btn-primary" href="{{ route('admin.cats.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

<form method="POST" action="{{ route('admin.cats.store') }}">
        @csrf
        <div class="form-group">
          <label for="addcat">Add New</label>
        <input type="text" class="form-control" id="addcat" placeholder="add new Categories" name="name" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>




@endsection
