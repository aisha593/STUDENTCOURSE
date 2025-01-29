<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

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

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

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

    public function destroy($id)
    {
         // Find the student and delete it
    $student = Student::find($id);

  
        $student->delete();

     

        return redirect('/students');
    }
}
