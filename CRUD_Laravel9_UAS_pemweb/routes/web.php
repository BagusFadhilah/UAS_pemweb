<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('/komik', [KomikController::class, 'index'])->name('komik.index');
Route::get('/komik/{id}', [KomikController::class, 'show'])->name('komik.show');
Route::get('/komik/{id}/chapters', [ChapterController::class, 'index'])->name('chapter.index');
Route::get('/komik/{komik_id}/chapters/{chapter_id}', [ChapterController::class, 'show'])->name('chapter.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard', [KomikController::class, 'adminDashboard'])->name('admin.dashboard');
// Route::get('/komik/create', [KomikController::class, 'create'])->name('admin.komik.create');
// Route::post('/komik', [KomikController::class, 'store'])->name('admin.komik.store');
// Route::get('/komik/{id}/edit', [KomikController::class, 'edit'])->name('admin.komik.edit');
// Route::put('/komik/{id}', [KomikController::class, 'update'])->name('admin.komik.update');
// Route::delete('/komik/{id}', [KomikController::class, 'destroy'])->name('admin.komik.destroy');
// Route::get('/komik/{id}/chapters/create', [ChapterController::class, 'create'])->name('admin.chapter.create');
// Route::post('/komik/{id}/chapters', [ChapterController::class, 'store'])->name('admin.chapter.store');
// Route::get('/komik/{komik_id}/chapters/{chapter_id}/edit', [ChapterController::class, 'edit'])->name('admin.chapter.edit');
// Route::put('/komik/{komik_id}/chapters/{chapter_id}', [ChapterController::class, 'update'])->name('admin.chapter.update');
// Route::delete('/komik/{komik_id}/chapters/{chapter_id}', [ChapterController::class, 'destroy'])->name('admin.chapter.destroy');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup rute untuk halaman-halaman private (memerlukan autentikasi)
//Route::middleware('auth')->group(function () {
    // Rute untuk halaman-halaman admin

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [KomikController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/komik/create', [KomikController::class, 'create'])->name('admin.komik.create');
        Route::get('/komik/{id}/chapters/create', [KomikController::class, 'createChapter'])->name('admin.chapter.create');
        Route::post('/komik/{id}/chapters', [KomikController::class, 'storeChapter'])->name('admin.chapter.store');
        Route::post('/komik/{komik_id}/chapters', [ChapterController::class, 'store'])->name('admin.chapter.store');
        Route::get('/komik/{id}/chapters/create', [ChapterController::class, 'create'])->name('admin.chapter.create');
        Route::get('/komik/{komik_id}/chapters/create', [ChapterController::class, 'create'])->name('admin.chapter.create');
        Route::post('/komik', [KomikController::class, 'store'])->name('admin.komik.store');
        Route::post('/komik/{id}/add-first-chapter', [ChapterController::class, 'addFirstChapter'])->name('admin.komik.add-first-chapter');
        Route::get('/komik/{id}/edit', [KomikController::class, 'edit'])->name('admin.komik.edit');
        Route::put('/komik/{id}', [KomikController::class, 'update'])->name('admin.komik.update');
        Route::delete('/komik/{id}', [KomikController::class, 'destroy'])->name('admin.komik.destroy');
        Route::get('/komik/{id}/chapters/create', [ChapterController::class, 'create'])->name('admin.chapter.create');
        Route::post('/komik/{id}/chapters', [ChapterController::class, 'store'])->name('admin.chapter.store');
        Route::get('/komik/{komik_id}/chapters/{chapter_id}/edit', [ChapterController::class, 'edit'])->name('admin.chapter.edit');
        Route::put('/komik/{komik_id}/chapters/{chapter_id}', [ChapterController::class, 'update'])->name('admin.chapter.update');
        Route::post('/komik/{komik_id}/chapters/{chapter_id}/images', [ChapterController::class, 'storeImage'])->name('admin.chapter.images.store');
        Route::delete('/komik/{komik_id}/chapters/{chapter_id}', [ChapterController::class, 'destroy'])->name('admin.chapter.destroy');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
//});
