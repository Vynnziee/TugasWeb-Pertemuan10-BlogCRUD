# TugasWeb-P10-BlogCRUD

Tugas Rutin 10 — Pemrograman Web · Blog CRUD dengan Laravel (Route::resource, Blade Components, Validasi).

## Fitur
- `Route::resource('posts', ...)` → 7 named route otomatis (`posts.index`, `posts.create`, `posts.store`, `posts.show`, `posts.edit`, `posts.update`, `posts.destroy`)
- `PostController` dengan 7 method resource lengkap
- Layout master `layouts/app.blade.php` dengan `@extends` / `@yield`
- 2 Blade component: `<x-alert>` dan `<x-card>`
- Validasi server-side + error per field (`@error`) + old input (`old()`)
- Flash message sukses setelah create/update/delete
- `@csrf` di semua form + `@method('PUT')` / `@method('DELETE')`
- Route Model Binding (`Post $post` langsung di parameter controller)
- Pagination (`paginate(6)`)
- Bonus: pencarian judul post, soft delete (kolom `deleted_at`)

## Prasyarat
PHP >= 8.2, Composer, MySQL (Laragon/XAMPP).

## Langkah Install
```bash
# 1. Clone & install dependency
git clone <repo-ini>
cd TugasWeb-P10-BlogCRUD
composer install

# 2. Copy .env & generate key
cp .env.example .env
php artisan key:generate

# 3. Buat database `blog_p10` di phpMyAdmin, lalu edit .env
#    DB_CONNECTION=mysql
#    DB_DATABASE=blog_p10
#    DB_USERNAME=root
#    DB_PASSWORD=

# 4. Migrate + seed data contoh
php artisan migrate --seed

# 5. Jalankan
php artisan serve
# buka http://127.0.0.1:8000
```

## Struktur Folder Penting
| File / Folder | Fungsi |
|---|---|
| `routes/web.php` | Mendefinisikan `Route::resource('posts', PostController::class)` |
| `app/Http/Controllers/PostController.php` | 7 method CRUD (index, create, store, show, edit, update, destroy) |
| `app/Models/Post.php` | Model Eloquent, pakai `SoftDeletes` |
| `database/migrations/` | Skema tabel `posts` (termasuk `deleted_at` untuk soft delete) |
| `database/seeders/PostSeeder.php` | 15 data contoh untuk menguji pagination |
| `resources/views/layouts/app.blade.php` | Layout master |
| `resources/views/components/alert.blade.php` | Component alert (sukses/gagal) |
| `resources/views/components/card.blade.php` | Component card pembungkus konten |
| `resources/views/posts/` | View index, show, create, edit |

## Screenshot
Tambahkan screenshot di sini:
- `screenshots/index.png` — daftar post + pagination
- `screenshots/create.png` — form buat post + validasi error
- `screenshots/show.png` — detail post
- `screenshots/edit.png` — form edit post
