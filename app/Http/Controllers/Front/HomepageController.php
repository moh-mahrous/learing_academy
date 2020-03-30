<?php

namespace App\Http\Controllers\Front;

use App\Test;
use App\Course;
use App\Student;
use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteContent;

class HomepageController extends Controller
{
    public function index()
    {


        $data['courses'] = Course::select('id', 'small_desc', 'cat_id', 'trainer_id', 'img', 'price', 'name')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $data['courses_count'] = Course::count();
        $data['trainers_count'] = Trainer::count();
        $data['students_count'] = Student::count();

        $data['tests'] = Test::select('name', 'spec', 'desc', 'img')->get();

        $data['banner']=  SiteContent::banner();

        return view('front.index')->with($data);
    }
}
