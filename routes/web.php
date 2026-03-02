<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Redirect halaman utama langsung ke list pegawai
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Route resource untuk fitur CRUD web
Route::resource('employees', EmployeeController::class);