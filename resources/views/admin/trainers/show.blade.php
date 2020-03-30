@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>trainers {{ $trainer->name }}</h6>
<a class="btn btn-primary" href="{{ route('admin.trainers.index') }}" role="button">Back </a>
</div>

<div>
     {{ $trainer->name }}
</div>
<hr>
<div>
     {{ $trainer->phone }}
</div>
<hr>
<div>
     {{ $trainer->spec }}
</div>
<hr>
<div>
    <img src="{{ asset('uploads/trainers/'. $trainer->img) }}" >
</div>




@endsection
