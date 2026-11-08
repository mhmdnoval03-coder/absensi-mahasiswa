# Sistem Absensi Kegiatan Mahasiswa

PHP Native + MySQL + Bootstrap 5 + Chart.js + SweetAlert2 + QRCode.js (semua library sudah ada di `assets/vendor`, tanpa internet).

## Cara menjalankan (XAMPP)
1. Salin folder `absensi-mahasiswa` ke `C:\xampp\htdocs\`.
2. Buka XAMPP Control Panel, Start **Apache** dan **MySQL**.
3. Buka `http://localhost/phpmyadmin` > tab **Import** > pilih `database/db_absensi_mahasiswa.sql` > Import.
4. Buka `http://localhost/absensi-mahasiswa/` (halaman publik) atau `/login.php` (admin).
5. Login admin: `admin` / `password`.

Jika password MySQL bukan kosong, ubah `config/database.php`.

## QR Code dari HP
Buka halaman admin lewat IP laptop (mis. `http://192.168.1.5/absensi-mahasiswa/login.php`), bukan `localhost`, lalu buka menu Kegiatan > QR. HP harus satu jaringan Wi-Fi.

## Struktur
config/ (koneksi) · includes/ (helper, layout) · admin/ (halaman admin) · mahasiswa/ (absensi dan riwayat) · assets/ · database/
