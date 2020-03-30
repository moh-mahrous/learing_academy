<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::orderBy('id', 'desc')->Paginate(50);
        return view('admin.students.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|max:150|unique:students',
        ]);

        Student::create($data);

        return (redirect(route('admin.students.index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|max:150|unique:students',

        ]);

        $student->update($data);
        return (redirect(route('admin.students.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return (redirect(route('admin.students.index')));
    }

    public function showCourses($id)
    {
        $student_courses = Student::findOrFail($id)->courses;

        $student_id = $id;

        return view('admin.students.showCourses', compact('student_courses', 'student_id'));
    }

    public function approveCourse($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
            'status' => 'approve'
        ]);
        return back();
    }

    public function rejectCourse($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->update([
            'status' => 'reject'
        ]);
        return back();
    }

    public function addCourse($id)
    {
        $student_id = $id;
        $courses = Course::select('id', 'name')->get();

        return view('admin.students.addCourse', compact('student_id', 'courses'));
    }

    public function storeCourse($id,Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        DB::table('course_student')->insert([
            'student_id' =>$id,
            'course_id' => $data['course_id']
        ]);
        return redirect(route('admin.students.showCourses',$id));
    }

}
