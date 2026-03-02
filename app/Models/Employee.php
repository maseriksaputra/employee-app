<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini untuk diisi data dari form (Mass Assignment)
    protected $fillable = [
        'name',
        'department',
        'position',
        'join_date',
        'document_path',
    ];
}