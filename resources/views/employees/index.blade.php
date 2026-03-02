@extends('layouts.app')

@section('content')
<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h2 class="mb-0"><i class="fas fa-users text-primary me-2"></i>Daftar Pegawai</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('employees.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-user-plus me-1"></i> Tambah Pegawai
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body" style="overflow-x: auto;"> 
        <table id="employeeTable" class="table table-hover table-bordered w-100">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Tanggal Bergabung</th>
                    <th class="text-center">Dokumen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $index => $employee)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-bold text-dark">{{ $employee->name }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ $employee->department }}</span>
                    </td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee->join_date)->format('d-m-Y') }}</td>
                    <td class="text-center">
                        @if($employee->document_path)
                            <a href="{{ asset('storage/' . $employee->document_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                        @else
                            <span class="text-muted"><i class="fas fa-minus"></i></span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi DataTable dengan opsi dasar
        $('#employeeTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Translate ke bahasa Indonesia
            },
            responsive: true
        });
    });
</script>
@endpush