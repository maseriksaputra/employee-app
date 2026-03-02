<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah menjadi true agar form diizinkan untuk diproses
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'department' => 'required|string',
            'position' => 'required|string',
            'join_date' => 'required|date',
            // Validasi file: maksimal 2MB, format gambar atau PDF
            'document' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', 
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'mimes' => 'Format dokumen harus berupa jpeg, png, jpg, atau pdf.',
            'max' => 'Ukuran dokumen maksimal 2MB.',
        ];
    }
}