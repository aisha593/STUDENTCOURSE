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
        try {
            // Validate the request
            $request->validate([
                'student_id' => 'required|exists:students,id',
                'course_id' => 'required|exists:courses,id',
            ]);
    
            // Find the student by ID
            $student = Student::find($request->student_id);
    
            if (!$student) {
                return redirect('/courses/enrollments')->with('error', 'Student not found.');
            }
    
            // Save the enrollment in the pivot table
            $student->courses()->attach($request->course_id);
    
            // Redirect with success message
            return redirect('/courses/enrollments')->with('success', 'Student enrolled successfully!');
        } catch (\Exception $e) {
            // Log the error (optional)
            \Log::error('Error enrolling student: ' . $e->getMessage());
    
            // Redirect with error message
            return redirect('/courses/enrollments')->with('error', 'An error occurred while enrolling the student.');
        }
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
