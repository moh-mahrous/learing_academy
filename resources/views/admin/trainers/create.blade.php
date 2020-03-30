@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h5>Trainers /Add New</h5>
    <a class="btn btn-primary" href="{{ route('admin.trainers.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

<form method="POST" action="{{ route('admin.trainers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">name</label>
        <input type="text" class="form-control" id="name" placeholder="add new Trainer" name="name" value="{{old('name')}}">
        </div>

        <div class="form-group">
          <label for="phone">phone</label>
          <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{old('name')}}">
        </div>

        <div class="form-group">
          <label for="spec">Speciality</label>
          <input type="text" class="form-control" id="spec" placeholder="Speciality" name="spec" value="{{ old('name')}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="File">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="File" name="img"
              value="{{old('img')}}">
              <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
            </div>
          </div>


        <button type="submit" class="btn btn-primary">Add Trainer</button>

      </form>




@endsection
