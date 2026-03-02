<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee; // Pastikan model dipanggil

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Perintah untuk mencetak 50 data dari EmployeeFactory
        Employee::factory(50)->create();
    }
}