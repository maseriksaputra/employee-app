<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeApiController;

// Endpoint API: GET /api/employees
Route::get('/employees', [EmployeeApiController::class, 'index']);