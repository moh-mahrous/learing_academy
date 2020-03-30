<?php

namespace App\Http\Controllers\Admin;

use App\Cat;
use App\Course;
use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data['courses'] = Course::orderBy('id', 'desc')->simplePaginate(25);

        return view('admin.courses.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cats'] = Cat::select('id','name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE );
        $data['trainers'] = Trainer::select('id','name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE );
        return view('admin.courses.create')->with($data);
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
            'name' => 'required|string|max:100',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'small_desc' => 'required|string|max:180',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'img' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $new_name = $data['img']->hashName();


        Image::make($data['img'])->save(public_path('uploads/courses/' . $new_name));

        $data['img'] = $new_name;

        Course::create($data);

        return (redirect(route('admin.courses.index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $cat = $course->cat->name;
        $trainer = $course->trainer->name;
        return view('admin.courses.show', compact('course','cat','trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $cats = Cat::select('id','name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE );
        $trainers = Trainer::select('id','name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE );
        return view('admin.courses.edit', compact('course','cats','trainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'small_desc' => 'required|string|max:180',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'img' => 'sometimes|image|mimes:jpeg,jpg,png',
        ]);

        $old_name = $course->img;

        if ($request->hasFile('img')) {
            Storage::disk('uploads')->delete('courses/' . $old_name);

            $new_name = $data['img']->hashName();

            Image::make($data['img'])->save(public_path('uploads/courses/' . $new_name));

            $data['img'] = $new_name;
        } else {
            $data['img'] = $old_name;
        }

        $course->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $old_name = $course->img;

        Storage::disk('uploads')->delete('courses/' . $old_name);

        $course->delete();

        return (redirect(route('admin.courses.index')));
    }
}
