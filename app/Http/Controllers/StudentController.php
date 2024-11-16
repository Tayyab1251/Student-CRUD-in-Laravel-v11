<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
            'name' => 'required|string|max:50',
            'fname' => 'required|string|max:50',
            'gender' => 'required|string|in:male,female,other',
            'email' => 'required|email|max:100',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required|string|max:160',
        ],[
            'name.required' => 'The name field is required.',
            'fname.required' => 'The father’s name field is required.',
            'gender.required' => 'Please select a gender.',
            'email.required' => 'The email field is required.',
            'phone.required' => 'The phone number is required.',
            'phone.numeric' => 'The phone number must contain only numbers.',
            'phone.digits' => 'The phone number must be exactly 11 digits.',
            'address.required' => 'The address field is required.',
            'address.max' => 'The max length of address is 160 characters.',
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
            notify('success', $student->name .' successfully added');
            return redirect('index'); 
        } else {
            notify('success', $student->name .' Operation Failed !');
            return redirect('index'); 
        }
    }
    // Function that returns all the records

    public function getStudents()
    {
        $students = Student::paginate(5);
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
            notify('success','Successfully deleted');
            return redirect('index');
        } else {
            notify('success',' Operation Failed !');
            return redirect('index');
        }
    }

    // Function that loads the edit page form
    public function loadEditForm($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }


    // Fynction to update the values of the user with previous

    public function updateStudent(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'fname' => 'required|string|max:50',
            'gender' => 'required|string|in:male,female,other',
            'email' => 'required|email|max:100',
            'phone' => 'required|numeric|digits:15',
            'address' => 'required|string|max:160',
        ]);

        // Find the student by ID
        $student = Student::findOrFail($id);

        $student->name = $validated['name'];
        $student->fname = $validated['fname'];
        $student->email = $validated['email'];
        $student->phone = $validated['phone'];
        $student->address = $validated['address'];
        $student->gender = $validated['gender'];

        // Save the updated student
        $isUpdated = $student->save();

        if ($isUpdated) {
            notify('success', $student->name .' successfully edited ');
            return redirect()->route('index');
        } else {
            notify('success', $student->name .' Failed to edit ');
            return back();
        }
    }
}
