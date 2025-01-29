<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Masmerise\Toaster\Toaster;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);
        return view('courses.index',compact('courses'));
    }


    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Course::create($validated);
        Toaster::success('User created!');

        return redirect('/courses');
    }

    
     /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courses = Course::find($id);
        return view('courses.edit', compact('courses'));
    }

     
       public function update(Request $request, $id)
    {
        $courses = Course::find($id);

        // Validate the request...
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
          
        ]);
        
        $courses->update($validated);

        return redirect('/courses');
    }

      /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
         // Find the course and delete it
    $course = Course::find($id);

        $course->delete();
    

        return redirect('/courses');
    }

//     public function enrollmentForm($id){
//         $student = Student::find($id);
//         $courses = Course::all();
//         // $courses = $student->courses; // Assuming you have a relationship defined in the Student model
//         return view('courseenrollment.course-enrollment',compact('student','courses'));
//     }
//     // public function enrollment(Request $request){
//     //     $validated = $request->Validate([

//     //     ]);
//     // }
//     public function enrollment(Request $request, $studentId)
// {
//     // Validate the input
//     $validated = $request->validate([
//         'course_id' => 'required|exists:courses,id',  // Ensure course exists
//     ]);

//     // Find the student
//     $student = Student::findOrFail($studentId);

//     // Attach the selected course to the student
//     $student->courses()->attach($validated['course_id']);

//     // Optionally, you could add additional logic, like a flash message or redirect with a success message
//     // return redirect()->route('students.show', $studentId) // Or another route
//     //     ->with('success', 'Student enrolled in course successfully!');
//     return redirect('/courses');
// }


}
