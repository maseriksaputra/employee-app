# 🏢 Employee Management System

Aplikasi web pendataan pegawai yang dibangun menggunakan framework **Laravel**. Proyek ini dibuat sebagai penyelesaian tugas **Technical Test Full Stack Developer**, dengan fokus utama pada pengalaman pengguna (UI/UX) yang ramah, responsif, dan interaktif untuk kemudahan pengisian form.

## ✨ Fitur Utama
* **Menampilkan & Mencari Data:** Menampilkan daftar pegawai dengan fitur pencarian, *sorting*, dan *pagination* otomatis menggunakan **DataTables**.
* **Tambah Data Pegawai:** Form interaktif yang ramah pengguna menggunakan kombinasi *plugin* modern:
    * **Select2:** Untuk pilihan dropdown (Departemen & Jabatan) yang bisa dicari.
    * **Daterangepicker:** Untuk kemudahan memilih "Tanggal Bergabung".
    * **Krajee FileInput:** Untuk fitur unggah (upload) dokumen/foto dengan antarmuka *drag-and-drop*.
* **Validasi Keamanan:** Dilengkapi validasi di sisi *client* (**jQuery Validation**) dan *server* (Laravel Form Request) sebelum data disimpan.
* **Data Dummy:** Dilengkapi dengan *Factory* dan *Seeder* untuk men-generate 50 data pegawai fiktif secara otomatis.
* **REST API:** Menyediakan endpoint API sederhana untuk mengambil daftar pegawai dalam format JSON.

## 🛠️ Teknologi & Resource yang Digunakan
* **Backend:** PHP 8.x, Laravel 11/12
* **Database:** MySQL
* **Frontend:** Bootstrap 5, HTML, CSS, JavaScript / jQuery
* **Library/Plugin:**
    * [DataTables](https://datatables.net/)
    * [Select2](https://select2.org/)
    * [DateRangePicker](https://www.daterangepicker.com/)
    * [Krajee FileInput](https://plugins.krajee.com/file-input)
    * [jQuery Validation](https://jqueryvalidation.org/)

## 🚀 Cara Instalasi & Menjalankan Proyek (Localhost)

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputer lokal Anda:

1. **Clone repositori ini:**
   ```bash
   git clone [https://github.com/USERNAME_ANDA/employee-app.git](https://github.com/USERNAME_ANDA/employee-app.git)
   cd employee-app
Install dependency PHP (Composer):

Bash
composer install
Atur konfigurasi Environment:
Duplikat file .env.example dan ubah namanya menjadi .env.

Bash
copy .env.example .env
Buka file .env tersebut dan sesuaikan konfigurasi database Anda (pastikan Anda sudah membuat database kosong bernama employee_db di MySQL/phpMyAdmin):

Code snippet
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_db
DB_USERNAME=root
DB_PASSWORD=
Generate Application Key:

Bash
php artisan key:generate
Jalankan Migrasi & Seeder:
Perintah ini akan membuat struktur tabel dan mengisi 50 data dummy pegawai.

Bash
php artisan migrate:fresh --seed
Buat Tautan Storage (Storage Link):
Wajib dijalankan agar dokumen/foto yang diunggah dapat diakses oleh browser.

Bash
php artisan storage:link
Jalankan Server Lokal:

Bash
php artisan serve
Aplikasi dapat diakses melalui browser di alamat: http://127.0.0.1:8000/employees

📡 Dokumentasi API (Nice to Have)
Aplikasi ini menyediakan endpoint untuk mengakses data pegawai via API.

Endpoint: GET /api/employees

URL Lokal: http://127.0.0.1:8000/api/employees

Response: JSON (List of all employees)

Dibuat oleh Erika Dwi Saputra untuk Technical Test Full Stack Developer.


**Langkah setelah di-copy:**
1. Paste ke dalam file `README.md` di project Anda.
2. Pada bagian `git clone`, ubah tulisan `USERNAME_ANDA` menjadi username GitHub Anda sendiri.
3. Save file tersebut, lalu push ke GitHub. Selesai!
