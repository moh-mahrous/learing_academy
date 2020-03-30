<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 300 ; $i++) { 
            # code...
            DB::table('course_student')->insert(
                [
                    'course_id' => App\Course::select('id')->orderByRaw("RAND()")->first()->id,
                    'student_id' => App\Student::select('id')->orderByRaw("RAND()")->first()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
