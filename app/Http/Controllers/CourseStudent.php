<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudent extends Controller
{
     /**
     * Show the form for creating a new resource.
     */
    public function enrollmentForm()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('courseenrollment.course-enrollment',compact('students','courses'));
        
    }

/**
     * Store a newly created resource in storage.
     */
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

    return redirect('/courses/enrollments');
}


/**
 * Display the enrollment table.
 */
public function showEnrollments()
{
    // Eager load the courses relationship with the students
$enrollments = Student::with('courses')->paginate(5);

    return view('courseenrollment.index', compact('enrollments'));
}

}
