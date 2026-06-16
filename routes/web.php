<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentDetailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RolePermissionController;

Route::get('/', function () {

    if (Auth::check()) {

        if (auth()->user()->role == 'admin') {
            return redirect('/admin/dashboard');
        }

        if (auth()->user()->role == 'student') {
            return redirect('/student/dashboard');
        }

        if (auth()->user()->role == 'staff') {
            return redirect('/staff/dashboard');
        }

        if (auth()->user()->role == 'parent') {
            return redirect('/parent/dashboard');
        }
    }

    return redirect('/login');
});
Route::get('/student/dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'role:student']);

Route::get(
    '/staff/dashboard',
    [StaffController::class, 'dashboard']
)->middleware(['auth', 'role:staff']);

Route::get(
    '/staff/profile',
    [StaffController::class, 'profile']
)->middleware(['auth', 'role:staff']);

Route::get('/parent/dashboard', function () {

    $parent = \App\Models\ParentDetail::where(
        'user_id',
        auth()->id()
    )->first();

    $student = $parent->student;

    return view(
        'parents.dashboard',
        compact(
            'parent',
            'student'
        )
    );

})->middleware(['auth', 'role:parent']);

Route::get('/parent/leaves', function () {

    $parent = \App\Models\ParentDetail::where(
        'user_id',
        auth()->id()
    )->first();

    if (!$parent || !$parent->student) {
        $leaves = collect();
    } else {

        $studentUserId =
            $parent->student->user_id;

        $leaves =
            \App\Models\Leave::where(
                'user_id',
                $studentUserId
            )->latest()->get();
    }

    return view(
        'parents.leaves',
        compact('leaves')
    );

})->middleware(['auth', 'role:parent']);

Route::get('/student/{name}', [StudentController::class, 'show']);

Route::get('/test', [StudentController::class, 'test']);

Route::get('/student/{id}', [StudentController::class, 'show']);

Route::get('/student-form', [StudentController::class, 'form']);

Route::post('/student-save', [StudentController::class, 'save']);

Route::get('/students-list', [StudentController::class, 'list']);


use App\Http\Controllers\SchoolClassController;

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_classes'
])->group(function () {

    Route::get('/classes/create', [SchoolClassController::class, 'create']);

    Route::post('/classes', [SchoolClassController::class, 'store']);

    Route::get('/classes', [SchoolClassController::class, 'index']);

    Route::get('/classes/{id}/edit', [SchoolClassController::class, 'edit']);

    Route::put('/classes/{id}', [SchoolClassController::class, 'update']);

    Route::delete('/classes/{id}', [SchoolClassController::class, 'destroy']);

});

use App\Http\Controllers\SectionController;

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_sections'
])->group(function () {

    Route::get('/sections/create', [SectionController::class, 'create']);

    Route::post('/sections', [SectionController::class, 'store']);

    Route::get('/sections', [SectionController::class, 'index']);

    Route::get('/sections/{id}/edit', [SectionController::class, 'edit']);

    Route::put('/sections/{id}', [SectionController::class, 'update']);

    Route::delete('/sections/{id}', [SectionController::class, 'destroy']);

});

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_students'
])->group(function () {

    Route::get('/students/create', [StudentController::class, 'create']);

    Route::post('/students', [StudentController::class, 'store']);

    Route::get('/students', [StudentController::class, 'index']);

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');

    Route::put('/students/{id}', [StudentController::class, 'update']);

    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_staff'
])->group(function () {

    Route::get('/staff/create', [StaffController::class, 'create']);

    Route::post('/staff', [StaffController::class, 'store']);

    Route::get('/staff', [StaffController::class, 'index']);

    Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])
        ->name('staff.edit');

    Route::put('/staff/{id}', [StaffController::class, 'update']);

    Route::delete('/staff/{id}', [StaffController::class, 'destroy']);

}); 

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_parents'
])->group(function () {

    Route::get('/parents/create', [ParentDetailController::class, 'create']);

    Route::post('/parents', [ParentDetailController::class, 'store']);

    Route::get('/parents', [ParentDetailController::class, 'index']);

    Route::get('/parents/{id}/edit', [ParentDetailController::class, 'edit']);

    Route::put('/parents/{id}', [ParentDetailController::class, 'update']);

    Route::delete('/parents/{id}', [ParentDetailController::class, 'destroy']);

});

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_fees'
])->group(function () {

    Route::get('/fees/create', [FeeController::class, 'create']);

    Route::post('/fees', [FeeController::class, 'store']);

    Route::get('/fees', [FeeController::class, 'index']);

    Route::get('/fees/{id}/edit', [FeeController::class, 'edit']);

    Route::put('/fees/{id}', [FeeController::class, 'update']);

    Route::delete('/fees/{id}', [FeeController::class, 'destroy']);

});

Route::get('/my-fees', [FeeController::class, 'myFees'])
    ->middleware('auth');

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:manage_leaves'
])->group(function () {

    Route::get('/leaves', [LeaveController::class, 'index']);

    Route::get('/leaves/{leave}/edit', [LeaveController::class, 'edit'])
        ->name('leaves.edit');

    Route::put('/leaves/{id}', [LeaveController::class, 'update']);

    Route::delete('/leaves/{id}', [LeaveController::class, 'destroy']);

    Route::put(
    '/leaves/{id}/approve',
    [LeaveController::class, 'approve']
);

Route::put(
    '/leaves/{id}/reject',
    [LeaveController::class, 'reject']
);

});

Route::middleware(['auth'])->group(function () {

    Route::get('/leaves/create', [LeaveController::class, 'create'])
        ->name('leaves.create');

    Route::post('/leaves', [LeaveController::class, 'store'])
        ->name('leaves.store');

});
Route::middleware(['auth'])->group(function () {

    Route::get('/my-leaves',
        [LeaveController::class, 'myLeaves'])
        ->name('my-leaves');

});

Route::middleware([
    'auth',
    // 'role:admin',
    'permission:view_reports'
])->group(function () {

    Route::get('/reports/students',
        [ReportController::class, 'students']);

    Route::get('/reports/fees',
        [ReportController::class, 'fees']);

    Route::get('/reports/leaves',
        [ReportController::class, 'leaves']);

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

});

Route::get('/parent/profile', function () {

    $parent = \App\Models\ParentDetail::where(
        'user_id',
        auth()->id()
    )->first();

    return view(
        'parents.profile',
        compact('parent')
    );

})->middleware(['auth', 'role:parent']);


Route::get('/role-test', function () {
    return 'Role Middleware Working';
})->middleware(['auth', 'role:student']);

Route::get('/user-dashboard', function () {

    return view('user-dashboard');

})->middleware('auth');

Route::get('/user/profile', function () {

    return view('user-profile');

})->middleware('auth');

require __DIR__.'/auth.php';

Route::get('/permission-test', function () {

    return 'Permission Working';

})->middleware([
    'auth',
    'permission:apply_leave'
]);

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {

    Route::get(
        '/roles-permissions',
        [RolePermissionController::class, 'index']
    );
    Route::get(
    '/roles-permissions/{role}/edit',
    [RolePermissionController::class, 'edit']
    );
    Route::put(
    '/roles-permissions/{role}',
    [RolePermissionController::class, 'update']
);
});