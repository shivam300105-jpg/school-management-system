<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;

Route::get('/students', [StudentApiController::class, 'index']);