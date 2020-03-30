@extends('admin.layout')

@section('content')

    <div class="d-flex justify-content-between mb-3">
    <h6>Students /show courses</h6>
    <a class="btn btn-info" href="{{ route('admin.students.addCourse', $student_id) }}" role="button">Add to course</a>
    <a class="btn btn-primary" href="{{ route('admin.students.index') }}" role="button">Back</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse  ($student_courses as $c)

                <tr class="table-light">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $c->name }}</td>
                <td>{{ $c->pivot->status }}</td>
                <td>
                    <div class="d-flex justify-content-around">

                        @if ($c->pivot->status !== 'approve')
                        <a class="btn btn-info" href="{{ route('admin.students.approveCourse' , [$student_id,$c->id]) }}" role="button">Approve</a>
                        @endif

                        @if ($c->pivot->status !== 'reject')
                        <a class="btn btn-danger" href="{{ route('admin.students.rejectCourse' , [$student_id,$c->id]) }}" role="button">Reject</a>
                        @endif

                        @empty
                        <p>No courses</p>

                    </div>
                </td>
                </tr>
                @endforelse



        </tbody>
      </table>





@endsection
