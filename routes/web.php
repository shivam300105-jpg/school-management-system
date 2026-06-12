<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentDetailController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/classes');
    }

    return redirect('/login');

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

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/classes/create', [SchoolClassController::class, 'create']);

    Route::post('/classes', [SchoolClassController::class, 'store']);

    Route::get('/classes', [SchoolClassController::class, 'index']);

    Route::get('/classes/{id}/edit', [SchoolClassController::class, 'edit']);

    Route::put('/classes/{id}', [SchoolClassController::class, 'update']);

    Route::delete('/classes/{id}', [SchoolClassController::class, 'destroy']);

});

use App\Http\Controllers\SectionController;

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/sections/create', [SectionController::class, 'create']);

    Route::post('/sections', [SectionController::class, 'store']);

    Route::get('/sections', [SectionController::class, 'index']);

    Route::get('/sections/{id}/edit', [SectionController::class, 'edit']);

    Route::put('/sections/{id}', [SectionController::class, 'update']);

    Route::delete('/sections/{id}', [SectionController::class, 'destroy']);

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/students/create', [StudentController::class, 'create']);

    Route::post('/students', [StudentController::class, 'store']);

    Route::get('/students', [StudentController::class, 'index']);

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');

    Route::put('/students/{id}', [StudentController::class, 'update']);

    Route::delete('/students/{id}', [StudentController::class, 'destroy']);

});

use App\Http\Controllers\StaffController;

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/staff/create', [StaffController::class, 'create']);

    Route::post('/staff', [StaffController::class, 'store']);

    Route::get('/staff', [StaffController::class, 'index']);

    Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])
        ->name('staff.edit');

    Route::put('/staff/{id}', [StaffController::class, 'update']);

    Route::delete('/staff/{id}', [StaffController::class, 'destroy']);

}); 

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/parents/create', [ParentDetailController::class, 'create']);

    Route::post('/parents', [ParentDetailController::class, 'store']);

    Route::get('/parents', [ParentDetailController::class, 'index']);

    Route::get('/parents/{id}/edit', [ParentDetailController::class, 'edit']);

    Route::put('/parents/{id}', [ParentDetailController::class, 'update']);

    Route::delete('/parents/{id}', [ParentDetailController::class, 'destroy']);

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

});

Route::get('/user-dashboard', function () {

    return view('user-dashboard');

})->middleware('auth');

require __DIR__.'/auth.php';