<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index()
    {
        // Mengambil semua data pegawai
        $employees = Employee::latest()->get();
        
        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Pegawai',
            'data'    => $employees
        ], 200);
    }
}