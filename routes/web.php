<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('index');
});

// Route for all students
Route::get('index', [StudentController::class, 'getStudents'])->name('index');
// Route for bviewing single student
Route::get('index/{id}',[StudentController::class,'getStudent']);
// Route to delete a student
Route::delete('index/{id}', [StudentController::class, 'deleteStudent']);
// Route for loading form to add a new student
Route::get('create',[StudentController::class,'getForm']);
// Route for adding new student
Route::post('create',[StudentController::class,'createStudent']);
// Route to load the edit form
Route::get('edit/{id}', [StudentController::class, 'loadEditForm'])->name('edit');
// Route to handle the form submission (update)
Route::put('edit/{id}', [StudentController::class, 'updateStudent'])->name('update');
