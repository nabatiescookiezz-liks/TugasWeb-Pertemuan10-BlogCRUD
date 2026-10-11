# Tugas Pertemuan 10 — Blog CRUD Laravel

Paket file untuk disalin ke proyek Laravel yang sudah kamu buat sebelumnya. Folder `vendor/` dan kerangka Laravel inti tidak disertakan.

## Fitur
- `Route::resource('posts', PostController::class)` dan named routes
- `PostController` dengan 7 method resource
- Master Blade layout dengan `@extends`, `@yield`, dan `@section`
- Blade components: `<x-alert />` dan `<x-card>`
- Validasi, error per field, dan `old()` untuk input teks
- Flash message sukses/gagal
- `@csrf`, `@method('PUT')`, dan `@method('DELETE')`
- Route model binding melalui `Post $post`
- Pagination dan pencarian judul/isi
- Soft delete
- Upload gambar opsional

## Instalasi
1. Ekstrak ZIP.
2. Salin/gabungkan isi folder ZIP ke folder utama proyek Laravel kamu (proyek tugas sebelumnya).
3. Buka terminal VS Code di folder utama proyek, pastikan file `artisan` terlihat.
4. Pastikan `.env` memiliki konfigurasi database yang benar.
5. Jalankan:

   ```bash
   php artisan migrate
   php artisan storage:link
   php artisan route:list --name=posts
   php artisan serve
   ```

6. Buka `http://127.0.0.1:8000/posts`.

## Catatan
- Jika `routes/web.php` sudah berisi route tugas sebelumnya, gabungkan route `PostController` dan `Route::resource(...)` secara manual agar route lama tidak hilang.
- Migration membuat tabel baru bernama `posts`. Pastikan tidak ada tabel `posts` yang sudah dibuat sebelumnya sebelum menjalankan `migrate`.
- Gambar disimpan di `storage/app/public/posts` dan ditampilkan melalui link storage.
- Soft delete mengisi kolom `deleted_at`; postingan terhapus tidak ditampilkan di daftar biasa. Fitur restore belum disertakan.
