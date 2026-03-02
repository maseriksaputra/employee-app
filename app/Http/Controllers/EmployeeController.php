<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest; // Import Form Request
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        // UNTUK DEBUGGING: Hapus tanda // pada baris di bawah ini untuk mengecek isi variabel
        // dd($employees); 

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    // Method baru untuk menyimpan data
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();

        // Cek jika ada file dokumen yang diupload
        if ($request->hasFile('document')) {
            // Simpan file ke folder storage/app/public/documents
            $path = $request->file('document')->store('documents', 'public');
            $validatedData['document_path'] = $path;
        }

        // Simpan ke database
        Employee::create([
            'name' => $validatedData['name'],
            'department' => $validatedData['department'],
            'position' => $validatedData['position'],
            'join_date' => date('Y-m-d', strtotime($validatedData['join_date'])),
            'document_path' => $validatedData['document_path'] ?? null,
        ]);

        return redirect()->route('employees.index')
                         ->with('success', 'Data pegawai berhasil ditambahkan!');
    }
}