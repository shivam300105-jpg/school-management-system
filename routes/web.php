<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index']);

Route::get('/staff', function () {
    return "Staff Page";
});

Route::get('/parents', function () {
    return "Parents Page";
});

Route::get('/fees', function () {
    return "Fees Page";
});

Route::get('/student/{name}', [StudentController::class, 'show']);

Route::get('/test', [StudentController::class, 'test']);

Route::get('/student/{id}', [StudentController::class, 'show']);

Route::get('/student-form', [StudentController::class, 'form']);

Route::post('/student-save', [StudentController::class, 'save']);

Route::get('/students-list', [StudentController::class, 'list']);