<?php

namespace App\Http\Controllers\Front;

use App\Message;
use App\Student;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function newslitter(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:100'
        ]);

        Newsletter::create($data);

        return back();
    }

    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string',
        ]);

        Message::create($data);

        return back();
    }

    public function enroll(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'spec' => 'nullable|string|max:100',
            'course_id' => 'required|exists:courses,id',
        ]);

        $old_student = Student::select('id')->where('email',$data['email'])->first();

        if($old_student == null) {

            $stu = Student::create([
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'spec'=>$data['spec'],
            ]);

            $stu_id = $stu->id;
        }else{
            $stu_id = $old_student->id;
        }




        DB::table('course_student')->insert(
            [
                'course_id' =>$data['course_id'] ,
                'student_id' => $stu_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return back();
    }
}
