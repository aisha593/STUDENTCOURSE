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
        // Validate the request...
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $student = new Student();
        $student->name = request('name');
        $student->email = request('email');
        $student->phone = request('phone');
        $student->save();

        return redirect('/students');
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
        $students = Student::find($id);
        // Validate the request...
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $students->update($validated);

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Find the student and delete it
    $student = Student::find($id);

  
        $student->delete();

     

        return redirect('/students');
    }
}
