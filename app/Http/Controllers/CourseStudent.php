<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudent extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function enrollmentForm()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('courseenrollment.course-enrollment',compact('students','courses'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
   // In the EnrollController

public function enroll(Request $request)
{
    // Validate
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_id' => 'required|exists:courses,id',
    ]);

    // Save the enrollment in the pivot table
    $student = Student::find($request->student_id);
    $student->courses()->attach($request->course_id);

    // return redirect()->route('enroll.index')->with('success', 'Student enrolled successfully!');
    return redirect('/courses');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
