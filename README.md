# Ujian Tengah Semester

Aplikasi web CRUD sederhana berbasis PHP native dan MySQL.

**Tema yang dipilih:** Data Mahasiswa

**Fitur:**
- Create, Read, Update, Delete data mahasiswa.
- Upload foto dengan sistem otomatis *rename* file menggunakan fungsi `time()` atau `uniqid()` untuk mencegah bentrok nama file.
- Validasi form (memastikan semua kolom wajib diisi, validasi format angka pada NIM, dan pengecekan ekstensi/ukuran file foto yang diupload).

**Kebutuhan Sistem:**
- Web Server: Apache (Laragon)
- PHP Version: 8.3.16
- MySQL Server Version: 8.4.3

**Cara Menjalankan:**
1. *Clone* atau *download* repository ini ke dalam folder `C:\laragon\www\`.
2. Buat database baru di phpMyAdmin/HeidiSQL.
3. *Import* file database SQL (jika ada) ke dalam database yang baru dibuat.
4. Sesuaikan konfigurasi koneksi database (nama *database*, *username*, *password*) pada file koneksi PHP.
5. Buka browser dan jalankan aplikasi melalui `http://localhost/nama-folder-project/`.
