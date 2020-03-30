@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h6>Categories /Edit {{$cat->name}} </h6>
    <a class="btn btn-primary" href="{{ route('admin.cats.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

<form method="POST" action="{{ route('admin.cats.update',$cat->id) }}">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="editcat">Edit Category</label>
        <input type="text" class="form-control" id="editcat" name="name" value="{{$cat->name ?? old('name')}}">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>

      </form>




@endsection
