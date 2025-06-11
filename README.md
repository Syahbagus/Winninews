# Winninews - Portal Berita dengan Laravel & Filament

Winninews adalah sebuah aplikasi portal berita modern yang dibangun menggunakan framework Laravel 11. Aplikasi ini dilengkapi dengan panel admin yang canggih dan responsif berkat Filament, memungkinkan manajemen konten yang mudah dan efisien.

## 🌟 Tentang Proyek

Proyek ini bertujuan untuk menyediakan platform portal berita yang cepat, aman, dan mudah digunakan, baik dari sisi pembaca maupun dari sisi administrator. Pembaca dapat dengan nyaman menjelajahi berita terbaru, melihat detail artikel, dan memberikan komentar. Sementara itu, admin memiliki kontrol penuh atas seluruh konten melalui dasbor admin yang intuitif.

### Dibangun Dengan

-   [**Laravel 11**](https://laravel.com/) - Framework PHP yang elegan dan ekspresif.
-   [**Filament 3**](https://filamentphp.com/) - Admin panel yang powerful untuk Laravel TALL Stack.
-   **Livewire** - Framework full-stack untuk membangun antarmuka dinamis.
-   **Tailwind CSS** - CSS framework yang mengutamakan utilitas.
-   **Alpine.JS** - Framework JavaScript minimalis.
-   **MySQL** - Sistem manajemen basis data relasional.

## ✨ Fitur Utama

-   **Tampilan Publik**: Halaman depan yang bersih untuk menampilkan berita kepada pembaca.
-   **Halaman Detail Berita**: Setiap berita memiliki halaman khususnya sendiri.
-   **Sistem Komentar**: Pengguna (tamu) dapat mendaftar, login, dan berpartisipasi dalam diskusi di setiap berita.
-   **Panel Admin Canggih**:
    -   Manajemen Berita (CRUD - Create, Read, Update, Delete).
    -   Manajemen Pengguna (Admin & Tamu).
    -   Manajemen Komentar.
-   **Fitur Pencarian**: Memudahkan pembaca mencari berita berdasarkan kata kunci.
-   **Trending News**: Menampilkan berita yang sedang populer (berdasarkan kolom `trending`).

## 🚀 Instalasi & Konfigurasi

Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut.

### Prasyarat

Pastikan server lokal Anda (seperti XAMPP, Laragon, atau Valet) memenuhi persyaratan berikut:

-   PHP 8.2 atau lebih tinggi
-   Composer
-   Node.js & NPM
-   Database (MySQL/MariaDB direkomendasikan)

### Langkah-langkah Instalasi

1.  **Clone Repository**
    Buka terminal Anda dan jalankan perintah berikut untuk meng-clone repository ini.

    ```bash
    git clone [https://github.com/syahbagus/winninews.git](https://github.com/syahbagus/winninews.git)
    cd winninews
    ```

2.  **Install Dependensi PHP**
    Install semua paket PHP yang dibutuhkan menggunakan Composer.

    ```bash
    composer install
    ```

3.  **Install Dependensi JavaScript**
    Install semua paket JavaScript yang dibutuhkan menggunakan NPM.

    ```bash
    npm install
    ```

4.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`. File ini akan menyimpan semua konfigurasi proyek Anda.

    ```bash
    cp .env.example .env
    ```

5.  **Generate Kunci Aplikasi**
    Setiap aplikasi Laravel membutuhkan kunci enkripsi yang unik.

    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan konfigurasi database berikut dengan pengaturan lokal Anda.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=winninews
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    _Pastikan Anda sudah membuat database dengan nama `winninews` (atau nama lain sesuai konfigurasi Anda) di MySQL._

7.  **Jalankan Migrasi & Seeder Database**
    Perintah ini akan membuat semua tabel yang diperlukan di database Anda dan mengisinya dengan beberapa data awal.

    ```bash
    php artisan migrate --seed
    ```

8.  **Buat Akun Admin**
    Filament menyediakan perintah praktis untuk membuat pengguna admin pertama Anda. Jalankan perintah di bawah ini dan ikuti instruksi yang muncul di terminal.

    ```bash
    php artisan make:filament-user
    ```

9.  **Buat Symbolic Link untuk Storage**
    Agar file yang di-upload (seperti gambar berita) dapat diakses dari web, buat symbolic link.

    ```bash
    php artisan storage:link
    ```

10. **Jalankan Aplikasi**
    Terakhir, jalankan server development Laravel dan Vite untuk kompilasi aset front-end.

    Buka **dua terminal terpisah**:

    -   Di terminal pertama, jalankan server Vite:

        ```bash
        npm run dev
        ```

    -   Di terminal kedua, jalankan server Laravel:
        ```bash
        php artisan serve
        ```

### Akses Aplikasi

-   **Halaman Publik**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
-   **Panel Admin**: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)
    -   Gunakan email dan password yang Anda buat pada langkah ke-8 untuk login.
