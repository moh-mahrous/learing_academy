@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h6>Student   Add course </h6>
    <a class="btn btn-primary" href="{{ route('admin.students.index') }}" role="button">Back</a>
    </div>

    @include('admin.inc.errors')

    <form method="POST" action="{{ route('admin.students.storeCourse',$student_id) }}">
        @csrf

        <div class="form-group">

            <label for="course_id">course</label>

                <select class="form-control" name="course_id">

                    @foreach ($courses as $course)

                    <option value="{{ $course->id }}">{{ $course->name }}</option>

                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add to  Course</button>

    </form>




@endsection
