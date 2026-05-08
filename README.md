# Ujian Tengah Semester - Pemrograman Web

Aplikasi web sederhana berbasis CRUD (Create, Read, Update, Delete) untuk mengelola inventaris produk. Proyek ini dibangun secara individu menggunakan PHP native dan database MySQL.

 Tema Proyek
**Data Produk (mengelola Nama Produk, Harga, Stok, dan Foto)

Identitas Mahasiswa
Nama: Mupti
NIM: 2430511087
Program Studi: Teknik Informatika
Universitas: Universitas Muhammadiyah Sukabumi (UMMI)

Spesifikasi & Fitur yang Diimplementasikan
1. Database & Koneksi: Menggunakan ekstensi MySQLi dengan nama database `db_uts_data_produk`.
2. Read Data: Menampilkan daftar produk dalam bentuk tabel HTML yang rapi, lengkap dengan *thumbnail* foto dan format harga Rupiah.
3. Create & Update Data (Form Ganda): - Satu form yang berfungsi untuk menambah produk baru dan mengedit produk lama (*pre-filled*).
   - Menggunakan tipe input `number` untuk validasi HTML pada harga dan stok.
4. Upload Foto: - Sistem unggah file dengan penggantian nama file otomatis menggunakan fungsi `time()` dan `uniqid()` untuk mencegah duplikasi.
   - Saat data diedit dan foto diganti, atau saat data dihapus, file foto fisik yang lama akan otomatis terhapus dari server (`unlink()`).
5. Validasi Frontend & Backend: - Pengecekan via JavaScript untuk memastikan tidak ada kolom yang kosong, tipe file harus gambar (jpg/jpeg/png), dan ukuran maksimal 2 MB.
   - Konfirmasi penghapusan (pop-up `confirm()`) agar data tidak terhapus tanpa sengaja.
6. UI/UX: Tata letak disesuaikan menggunakan file CSS eksternal terpisah agar antarmuka rapi, terpusat, dan mudah digunakan.

Teknologi Utama
- HTML & CSS
- JavaScript
- PHP (Native)
- MySQL
