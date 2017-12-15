<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home/', 'CourseController@display')->name('home');
Route::get('/', function () {
    return view('auth/login');
})->name('auth-login');

//Teacher authentication & authorization

Route::group(['middleware' => ['teacher.auth']], function () {

    Route::get('/course/{course}', 'CourseController@display')->name('course');
    Route::get('/course/{course}/students', 'StudentController@index')->name('students');
    Route::get('/course/{course}/students/{student}', 'StudentController@display')->name('student_detail');
    Route::get('/course/{course}/exercises', 'ExerciseController@index')->name('exercises');
    Route::get('/course/{course}/exercises/{exercise}', 'ExerciseController@display')->name('exercise_detail');
    Route::get('/course/{course}/calendar', 'CalendarController@initCalendar')->name('calendar');
});



Route::get('/studentsfeedback', function () {
    return view('students_feedback');
})->name('students_feedback');

Route::get('/homeworksfeedback', function () {
    return view('homeworks_feedback');
})->name('homeworks_feedback');

Route::get('/coursefeedback', function () {
    return view('course_feedback');
})->name('course_feedback');


Route::post('/login', 'LoginController@authenticate')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
