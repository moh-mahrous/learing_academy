@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>courses {{ $course->name }}</h6>
<a class="btn btn-primary" href="{{ route('admin.courses.index') }}" role="button">Back </a>
</div>

<div>
     {{ $course->name }}
</div>
<hr>
<div>
     {{ $cat }}
</div>
<hr>
<div>
     {{ $trainer }}
</div>
<hr>
<div>
     {{ $course->small_desc }}
</div>
<hr>
<div>
     {{ $course->desc }}
</div>
<hr>
<div>
     {{ $course->price }}
</div>
<hr>
<div>
    <img src="{{ asset('uploads/courses/'. $course->img) }}" >
</div>




@endsection
