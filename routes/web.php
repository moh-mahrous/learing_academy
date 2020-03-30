<?php

use Illuminate\Support\Facades\Route;



Route::namespace('Front')->group(function () {


    Route::get('/', 'HomepageController@index')->name('front.homepage');
    Route::get('/cat/{id}', 'CourseController@cat')->name('front.cat');
    Route::get('/cat/{id}/course/{c_id}', 'CourseController@show')->name('front.show');

    Route::get('/contact', 'ContactController')->name('front.contact');

    Route::post('message/newslitter', 'MessageController@newslitter')->name('front.message.newslitter');
    Route::post('message/contact', 'MessageController@contact')->name('front.message.contact');
    Route::post('message/enroll', 'MessageController@enroll')->name('front.message.enroll');

});

Route::namespace('Admin')->prefix('dashboard')->group(function () {

    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/do-login', 'AuthController@doLogin')->name('admin.doLogin');

    Route::middleware('admin:admin')->name('admin.')->group(function(){

        Route::get('/logout', 'AuthController@logout')->name('logout');
        Route::get('/', 'HomeController')->name('home');

        Route::resource('cats', 'CatController')->except(['show']);
        Route::resource('trainers', 'TrainerController');
        Route::resource('courses', 'CourseController');

        Route::resource('students', 'StudentController')->except(['show']);
        Route::get('/students/show-course/{id}', 'StudentController@showCourses')->name('students.showCourses');
        Route::get('/students/{id}/courses/{c_id}/approve', 'StudentController@approveCourse')->name('students.approveCourse');
        Route::get('/students/{id}/courses/{c_id}/reject', 'StudentController@rejectCourse')->name('students.rejectCourse');
        Route::get('/students/{id}/add-to-course', 'StudentController@addCourse')->name('students.addCourse');
        Route::post('/students/{id}/add-to-course', 'StudentController@storeCourse')->name('students.storeCourse');


    });
});
