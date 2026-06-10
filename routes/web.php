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


use App\Http\Controllers\SchoolClassController;

Route::get('/classes/create', [SchoolClassController::class, 'create']);

Route::post('/classes', [SchoolClassController::class, 'store']);

Route::get('/classes', [SchoolClassController::class, 'index']);

Route::get('/classes/{id}/edit', [SchoolClassController::class, 'edit']);

Route::put('/classes/{id}', [SchoolClassController::class, 'update']);

Route::delete('/classes/{id}', [SchoolClassController::class, 'destroy']);

use App\Http\Controllers\SectionController;

Route::get('/sections/create', [SectionController::class, 'create']);
Route::post('/sections', [SectionController::class, 'store']);
Route::get('/sections', [SectionController::class, 'index']);

Route::get('/sections/{id}/edit', [SectionController::class, 'edit']);

Route::put('/sections/{id}', [SectionController::class, 'update']);
Route::delete('/sections/{id}', [SectionController::class, 'destroy']);