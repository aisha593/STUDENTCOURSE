<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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
    try {
        // Validate the incoming request
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Create a new course
        Course::create($validated);

        // Flash a success message to the session
        return redirect('/')->with('success', 'Course created successfully!');
    } catch (\Exception $e) {
        // Flash an error message to the session
        return redirect('/')->with('error', 'Something went wrong: ' . $e->getMessage());
    }
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
        try {
            $courses = Course::find($id);
    
            // Validate the request...
            $validated = $request->validate([
                'course_name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
            ]);
            
            // Update the course
            $courses->update($validated);
    
            return redirect('/')->with('success', 'Course updated successfully!');
        } catch (\Exception $e) {
            // Log the error message (optional) or handle it
            \Log::error('Error updating course: ' . $e->getMessage());
    
            return redirect('/')->with('error', 'An error occurred while updating the course.');
        }
    }

      /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the course by ID
            $course = Course::find($id);
    
            // Delete the course
            $course->delete();
    
            return redirect('/')->with('success', 'Course deleted successfully!');
        } catch (\Exception $e) {
            // Log the error (optional)
            \Log::error('Error deleting course: ' . $e->getMessage());
    
            return redirect('/')->with('error', 'An error occurred while deleting the course.');
        }
    }
    


}
