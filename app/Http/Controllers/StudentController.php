<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Function that loads the form by clicking the add student button 
    public function getForm()
    {
        return view('create');
    }
    public function createStudent(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'gender' => 'required|string|in:male,female,other',
        ]);

        // Create a new student instance
        $student = new Student();
        $student->name = $request->name;
        $student->fname = $request->fname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->gender = $request->gender;

        $isSaved = $student->save();

        if ($isSaved) {
            return redirect('index');
        } else {
            return 'Operation Failed...';
        }
    }
    // Function that returns all the records

    public function getStudents()
    {
        $students = Student::all();
        // $students = DB::table('students')->get();
        return view('index', ['students' => $students]);
    }

    // Function that will take input an id and returns the result against the passed id

    public function getStudent($id)
    {
        $student = Student::find($id);
        return view('form', compact('student'));
    }

    // Function that take an input of student id and deletes the data against the id

    public function deleteStudent($id)
    {
        $student = Student::destroy($id);
        if ($student) {
            return redirect('index')->with('success', 'Student deleted successfully!');
        } else {
            return redirect('index')->with('error', 'Error deleting student');
        }
    }

    // Function that loads the edit page form
    public function loadEditForm($id)
    {
        // Find the student by ID, or throw a 404 if not found
        $student = Student::findOrFail($id);
    
        // Return the edit view with the student data
        return view('edit', compact('student'));
    }
    

    // Fynction to update the values of the user with previous

    public function updateStudent(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'gender' => 'required|string|in:male,female,other',
        ]);
    
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Update the student attributes
        $student->name = $validated['name'];
        $student->fname = $validated['fname'];
        $student->email = $validated['email'];
        $student->phone = $request->phone; // Ensure 'phone' field is passed in the form
        $student->address = $validated['address'];
        $student->gender = $validated['gender'];
    
        // Save the updated student
        $isUpdated = $student->save();
    
        // Redirect with success message if update is successful
        if ($isUpdated) {
            return redirect()->route('index')->with('success', 'Student updated successfully.');
        } else {
            // If update failed, return with error message
            return back()->with('error', 'Failed to update the student.');
        }
    }
    
    
}
