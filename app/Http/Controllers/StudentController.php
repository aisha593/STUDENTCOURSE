<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request...
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);
    
            // Create a new student
            $student = new Student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();
    
            // Redirect with success message
            return redirect('/students')->with('success', 'Student added successfully!');
        } catch (\Exception $e) {
            // Log the error (optional)
            \Log::error('Error storing student: ' . $e->getMessage());
    
            // Redirect with error message
            return redirect('/students')->with('error', 'Email already exist.');
        }
    }
    

     /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the student by ID
            $students = Student::find($id);
    
            if (!$students) {
                return redirect('/students')->with('error', 'Student not found.');
            }
    
            // Validate the request...
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);
    
            // Update the student with validated data
            $students->update($validated);
    
            // Redirect with success message
            return redirect('/students')->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            // Log the error (optional)
            \Log::error('Error updating student: ' . $e->getMessage());
    
            // Redirect with error message
            return redirect('/students')->with('error', 'An error occurred while updating the student.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the student by ID
            $student = Student::find($id);
    
            // Delete the student
            $student->delete();
    
            // Redirect with success message
            return redirect('/students')->with('success', 'Student deleted successfully!');
        } catch (\Exception $e) {
            // Log the error (optional)
            \Log::error('Error deleting student: ' . $e->getMessage());
    
            // Redirect with error message
            return redirect('/students')->with('error', 'An error occurred while deleting the student.');
        }
    }
    
}
