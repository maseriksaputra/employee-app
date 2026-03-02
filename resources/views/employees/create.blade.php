@extends('layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Tambah Data Pegawai</h2>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form id="employeeForm" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="department" class="form-label">Departemen <span class="text-danger">*</span></label>
                    <select class="form-select select2-plugin" id="department" name="department">
                        <option value="">Pilih Departemen...</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                    <select class="form-select select2-plugin" id="position" name="position">
                        <option value="">Pilih Jabatan...</option>
                        <option value="Staff">Staff</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Manager">Manager</option>
                        <option value="Director">Director</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="join_date" class="form-label">Tanggal Bergabung <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="join_date" name="join_date" placeholder="Pilih tanggal">
            </div>

            <div class="mb-4">
                <label for="document" class="form-label">Unggah Dokumen / Foto Profile (Opsional)</label>
                <input id="document" name="document" type="file" class="file" data-browse-on-zone-click="true">
                <small class="text-muted">Format: JPG, PNG, PDF. Maksimal 2MB.</small>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Data Pegawai</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/fileinput.min.js"></script>

<script>
    $(document).ready(function() {
        // 1. Inisialisasi Select2
        $('.select2-plugin').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: $(this).data('placeholder')
        });

        // 2. Inisialisasi Daterangepicker (Single Datepicker Mode)
        $('#join_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Batal',
                applyLabel: 'Pilih'
            }
        });

        // Update input ketika tanggal dipilih
        $('#join_date').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
            $(this).valid(); // Triger validasi saat diisi
        });

        // 3. Inisialisasi Krajee FileInput
        $("#document").fileinput({
            theme: 'fa5',
            showUpload: false, // Sembunyikan tombol upload bawaan plugin (ikut form submit)
            showCancel: false,
            allowedFileExtensions: ['jpg', 'png', 'jpeg', 'pdf'],
            maxFileSize: 2000,
            dropZoneEnabled: true
        });

        // 4. Inisialisasi jQuery Validation
        $('#employeeForm').validate({
            rules: {
                name: "required",
                department: "required",
                position: "required",
                join_date: "required"
            },
            messages: {
                name: "Silakan masukkan nama pegawai",
                department: "Silakan pilih departemen",
                position: "Silakan pilih jabatan",
                join_date: "Silakan pilih tanggal bergabung"
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else if (element.hasClass("select2-hidden-accessible")) {
                    error.insertAfter(element.next('.select2-container')); // Error untuk select2
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });

        // Integrasi validasi dengan Select2 agar warna merahnya hilang saat dipilih
        $('.select2-plugin').on('change', function() {
            $(this).valid();
        });
    });
</script>
@endpush