@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h5>Courses /Add New</h5>
    <a class="btn btn-primary" href="{{ route('admin.courses.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">name</label>
        <input type="text" class="form-control" id="name" placeholder="add new Course" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">

        <label for="cat_id">catogory</label>
            <select class="form-control" name="cat_id">
                @foreach ($cats as $cat)

                <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">

        <label for="trainer_id">Trainer</label>
            <select class="form-control" name="trainer_id">

                @foreach ($trainers as $trainer)

                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="small_desc">Small desc</label>
          <input type="text" class="form-control" id="small_desc" placeholder="Small desc" name="small_desc" value="{{old('small_desc')}}">
        </div>

        <div class="form-group">
          <label for="phone">Desc</label>
          <textarea name="desc" class="form-control">{{old('desc')}}</textarea>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price')}}">
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


        <button type="submit" class="btn btn-primary">Add Course</button>

      </form>




@endsection
