<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('index');
});

// Route::view('index', 'index');
// Route::view('student','student');

Route::get('index',[StudentController::class,'getStudents']);

Route::get('index/{id}',[StudentController::class,'getStudent']);

// Route to delete a student
Route::delete('index/{id}', [StudentController::class, 'deleteStudent']);

Route::get('create',[StudentController::class,'getForm']);

Route::post('create',[StudentController::class,'createStudent']);
