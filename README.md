<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Pojok Komik - Laravel Backend

Aplikasi backend Laravel untuk platform baca komik digital **Pojok Komik**.  
Proyek ini menyediakan fitur CRUD komik, chapter, autentikasi user, dark mode, dan integrasi frontend dengan Tailwind CSS & Vite.

---

## 🚀 Cara Install & Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/username/rpl-backend.git
cd rpl-backend
```

### 2. Install Dependency PHP & JS

```bash
composer install
npm install
```

### 3. Setup Environment File

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) sesuai lokal kalian.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Migrasi Database

```bash
php artisan migrate
```

### 6. (Opsional) Seed Database

```bash
php artisan db:seed
```

### 7. Link Storage (untuk upload gambar)

```bash
php artisan storage:link
```

### 8. Jalankan Vite (untuk Tailwind & JS)

```bash
npm run dev
```

### 9. Jalankan Server Laravel

```bash
php artisan serve
```

Akses aplikasi di [http://localhost:8000](http://localhost:8000)

---

## 🗂️ Struktur Folder Penting

-   `app/Models` : Model Eloquent (Comic, Chapter, User, dll)
-   `app/Http/Controllers` : Controller utama (ComicController, ChapterController, dsb)
-   `resources/views` : Blade template (index, show, create, dsb)
-   `routes/web.php` : Routing utama aplikasi
-   `database/migrations` : Struktur tabel database
-   `public/storage` : Tempat file upload (cover komik, dsb)

---

## ⚡️ Fitur Utama

-   **Autentikasi User:** Login, register, reset password.
-   **Manajemen Komik:** Tambah, edit, hapus, lihat detail komik.
-   **Manajemen Chapter:** Tambah, edit, hapus, lihat chapter per komik.
-   **Upload Cover Komik:** Simpan gambar cover ke storage.
-   **Dark Mode:** User bisa toggle dark/light mode, preferensi disimpan di browser (tidak mengikuti OS).
-   **Responsive Design:** Menggunakan Tailwind CSS, tampilan nyaman di desktop & mobile.
-   **Dashboard User:** Melihat status login dan akses fitur utama.
-   **Fitur Guest:** Halaman welcome dengan preview komik terbaru.

---

## 🎨 Dark Mode

-   Dark mode **tidak mengikuti OS**, hanya mengikuti pilihan user.
-   Preferensi dark mode disimpan di localStorage browser.
-   Jika dark mode tidak berubah, clear cache browser dan pastikan script dark mode tidak memakai preferensi OS.
-   Script dark mode ada di layout utama dan welcome page.

---

## 📝 Catatan untuk Tim

-   **Selalu lakukan `git pull` sebelum mulai kerja.**
-   **Jangan commit file `.env` atau file sensitif ke repo.**
-   **Jika upload gambar error, pastikan sudah jalankan `php artisan storage:link`.**
-   **Jika ada error migration, cek struktur tabel di folder `database/migrations`.**
-   **Untuk fitur baru, buat branch baru lalu PR ke main.**
-   **Jalankan `npm run dev` agar perubahan CSS/JS langsung terlihat.**
-   **Jika ada masalah dark mode, cek script dark mode di layout utama.**

---

## 🛠️ Teknologi yang Digunakan

-   **Laravel** (Backend utama)
-   **PHP** (>=8.1)
-   **MySQL/MariaDB** (Database)
-   **Tailwind CSS** (Styling)
-   **Vite** (Asset bundler)
-   **JavaScript** (Interaktifitas frontend)
-   **Blade** (Template engine Laravel)

---

## ❓ FAQ & Bantuan

-   **Error saat migrate?**  
    Cek koneksi database di `.env` dan pastikan DB sudah dibuat.
-   **Gambar tidak muncul?**  
    Jalankan `php artisan storage:link`.
-   **Dark mode tidak konsisten?**  
    Pastikan script dark mode hanya pakai localStorage, tidak pakai preferensi OS.
-   **Butuh bantuan?**  
    Tanya di grup atau cek [Laravel Docs](https://laravel.com/docs).

---

## 🤝 Kontribusi

Terima kasih telah mempertimbangkan untuk berkontribusi!  
Buat branch baru untuk fitur/bugfix, lalu ajukan Pull Request ke main.  
Ikuti standar kode dan struktur folder yang sudah ada.

---


