<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudent;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
    
    
// });



//courses management
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');

Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');

Route::post('/courses/edit/{id}', [CourseController::class, 'update'])->name('courses.update');

Route::get('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('course.destroy');


//students
Route::get('/students', [StudentController::class,'index' ])->name('students.index');

Route::get('/students/create', [StudentController::class,'create' ]);

Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/edit/{id}',[StudentController::class, 'edit'])->name('student.edit');

Route::post('/students/edit/{id}',[StudentController::class, 'update'])->name('students.update');

Route::get('students/destroy/{id}',[StudentController::class, 'destroy'])->name('student.destroy');


//enrollment

Route::get('/courses/enrollment',[CourseStudent::class, 'enrollmentForm'])->name('enrollment.form');

Route::post('/courses/enrollment', [CourseStudent::class, 'enroll'])->name('courses.enroll');

Route::get('/courses/enrollments', [CourseStudent::class, 'showEnrollments'])->name('courses.enrollments');