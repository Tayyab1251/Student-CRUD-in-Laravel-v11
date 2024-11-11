<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Function that loads the form by clicking the add student button 
    public function getForm() {
        return view('create');
    }
    public function createStudent(Request $request) {
        // Validate the form data
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

    public function getStudents(){
        
        $students = DB::table('students')->get();
        return view('index',['students'=> $students]);
    }

    // Function that will take input an id and returns the result against the passed id

    public function getStudent($id) {

        $student = DB::table('students')->find($id);
        return view('form',compact('student'));
    }

    /*Function that take an input of student id and deletes the data against the id
    public function deleteStudent($id) {
        $student = Student::destroy($id);
        if($student) {
            return redirect('index');
        }else{
            return 'Error.....';
        }
    }*/
    public function deleteStudent($id) {

        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect('index')->with('success', 'Student deleted successfully');
        } else {
            return redirect('index')->with('error', 'Student not found');
        }
    }
    
}
