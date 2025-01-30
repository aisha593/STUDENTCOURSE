<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Masmerise\Toaster\Toaster;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(5);
        return view('courses.index',compact('courses'));
    }

/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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

     
    /**
     * Update the specified resource in storage.
     */
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


}
