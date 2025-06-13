# Winninews - Portal Berita dengan Laravel & Filament

Winninews adalah sebuah aplikasi portal berita modern yang dibangun menggunakan framework Laravel 11. Aplikasi ini dilengkapi dengan panel admin yang canggih dan responsif berkat Filament, memungkinkan manajemen konten yang mudah dan efisien.

## 🌟 Tentang Proyek

Proyek ini bertujuan untuk menyediakan platform portal berita yang cepat, aman, dan mudah digunakan, baik dari sisi pembaca maupun dari sisi administrator. Pembaca dapat dengan nyaman menjelajahi berita terbaru, melihat detail artikel, dan memberikan komentar. Sementara itu, admin memiliki kontrol penuh atas seluruh konten melalui dasbor admin yang intuitif.

### Dibangun Dengan

-   [**Laravel 11**](https://laravel.com/) - Framework PHP yang elegan dan ekspresif.
-   [**Filament 3**](https://filamentphp.com/) - Admin panel yang powerful untuk Laravel TALL Stack.
-   **Tailwind CSS** - CSS framework yang mengutamakan utilitas.
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
-   **Trending News**: Menampilkan berita yang sedang populer.

## 🚀 Instalasi & Konfigurasi

Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut.

### Prasyarat

Pastikan server lokal Anda (seperti XAMPP, Laragon, atau Valet) memenuhi persyaratan berikut:

-   PHP 8.3 atau lebih tinggi
-   Composer
-   Node.js & NPM
-   Database (MySQL/MariaDB direkomendasikan)

### Langkah-langkah Instalasi

1.  **Clone Repository**

    ```bash
    git clone [https://github.com/syahbagus/winninews.git](https://github.com/syahbagus/winninews.git)
    cd winninews
    ```

2.  **Install Dependensi PHP & JavaScript**

    ```bash
    composer install
    npm install
    ```

3.  **Buat & Konfigurasi File Environment**
    Salin file `.env.example`, lalu generate kunci aplikasi.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Buka file `.env` dan sesuaikan konfigurasi database Anda.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=winninews
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Jalankan Migrasi & Seeder Database**

    ```bash
    php artisan migrate --seed
    ```

5.  **Buat Akun Superadmin**
    Jalankan perintah di bawah ini untuk membuat akun superadmin secara otomatis. Perintah ini hanya perlu dijalankan sekali.

    ```bash
    php artisan app:create-superadmin
    ```

6.  **Buat Symbolic Link untuk Storage**

    ```bash
    php artisan storage:link
    ```

7.  **Jalankan Aplikasi**
    Buka **dua terminal terpisah**:

    -   Terminal 1 (Vite):
        ```bash
        npm run dev
        ```
    -   Terminal 2 (Laravel):
        ```bash
        php artisan serve
        ```

8.  **Akses Aplikasi**

-   **Halaman Publik**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
-   **Panel Admin**: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

9. **Gunakan kredensial berikut untuk login sebagai superadmin**

-   **Email:** `superadmin@winni.com`
-   **Password:** `password`

---

## 📂 Struktur Proyek & Dokumentasi

Berikut adalah penjelasan untuk folder dan file utama dalam proyek ini.

-   `app/` - Direktori inti dari aplikasi Laravel.

    -   `Filament/` - Berisi semua konfigurasi untuk panel admin Filament.
        -   `Resources/` - Mendefinisikan bagaimana setiap model (Berita, Tamu, dll.) akan dikelola (CRUD) di panel admin.
            -   `BeritaResource.php`: Konfigurasi halaman manajemen berita.
            -   `GuestResource.php`: Konfigurasi halaman manajemen tamu (pembaca).
            -   `KomentarResource.php`: Konfigurasi halaman manajemen komentar.
            -   `AdminResource.php`: Konfigurasi halaman manajemen admin.
    -   `Http/Controllers/` - Berisi controller yang menangani logika untuk request dari pengguna.
        -   `LandingController.php`: Mengatur data untuk halaman utama.
        -   `NewsController.php`: Mengatur tampilan detail berita.
        -   `GuestAuthController.php`: Menangani proses login, register, dan logout untuk tamu.
        -   `KomentarController.php`: Menangani proses pengiriman komentar.
        -   `SearchController.php`: Menangani logika pencarian berita.
    -   `Models/` - Berisi kelas Model yang merepresentasikan tabel di database.
        -   `Berita.php`: Model untuk tabel `berita`, terhubung dengan `Komentar` dan `User`.
        -   `Guest.php`: Model untuk tabel `guests`, merepresentasikan pengguna non-admin.
        -   `Komentar.php`: Model untuk tabel `komentar`, terhubung dengan `Berita` dan `Guest`.
        -   `User.php`: Model default Laravel, **tidak digunakan** untuk otentikasi panel admin di proyek ini.
    -   `Providers/` - Berisi Service Provider.
        -   `Filament/AdminPanelProvider.php`: File konfigurasi utama untuk panel admin, seperti registrasi halaman, widget, dan navigasi.

-   `config/` - Berisi semua file konfigurasi aplikasi.

    -   `app.php`: Konfigurasi dasar aplikasi.
    -   `database.php`: Konfigurasi koneksi database.
    -   `filesystems.php`: Konfigurasi lokasi penyimpanan file (disk).

-   `database/` - Berisi semua yang berhubungan dengan database.

    -   `factories/` - Digunakan untuk membuat data palsu (dummy data) untuk testing.
    -   `migrations/` - Berisi file-file yang mendefinisikan struktur (skema) tabel database Anda.
    -   `seeders/` - Berisi kelas untuk mengisi data awal ke dalam database (`db:seed`).
        -   `DatabaseSeeder.php`: File utama yang dieksekusi saat proses seeding.

-   `public/` - Folder yang dapat diakses secara publik. Semua request masuk ke sini.

    -   `index.php`: Titik masuk (entry point) untuk semua request.
    -   `storage/`: Symbolic link ke `storage/app/public` untuk file yang di-upload.

-   `resources/` - Berisi file "mentah" seperti view, CSS, dan JavaScript sebelum dikompilasi.

    -   `css/` - Berisi file CSS, seperti `app.css`.
    -   `js/` - Berisi file JavaScript, seperti `app.js`.
    -   `views/` - Berisi semua file template HTML (Blade).
        -   `layouts/home.blade.php`: Template layout utama untuk halaman publik.
        -   `pages/landing.blade.php`: Tampilan untuk halaman utama.
        -   `pages/news/show.blade.php`: Tampilan untuk halaman detail berita.
        -   `auth/guest-login.blade.php`: Tampilan untuk halaman login tamu.

-   `routes/` - Berisi semua definisi rute (URL) untuk aplikasi.

    -   `web.php`: Mendefinisikan semua rute yang diakses melalui browser. Ini adalah "peta jalan" aplikasi Anda.

-   `storage/` - Berisi file yang di-generate oleh framework, file upload, cache, dan log.

    -   `app/public/`: Lokasi penyimpanan file yang seharusnya bisa diakses publik (misal: gambar berita).
    -   `framework/`: Berisi file cache yang dibuat oleh Laravel.
    -   `logs/`: Berisi file log error aplikasi (`laravel.log`).

-   `.env` - File environment yang berisi kredensial dan konfigurasi spesifik untuk lingkungan Anda.
-   `composer.json` - Mendefinisikan dependensi PHP untuk proyek ini.
-   `package.json` - Mendefinisikan dependensi JavaScript/Node.js untuk proyek ini.
