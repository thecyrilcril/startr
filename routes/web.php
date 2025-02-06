<?php

declare(strict_types=1);

use App\Http\Controllers\FilePondController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));

Route::view(uri: '/contact', view: 'contact')->name('contact');

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('upload', FileUploadController::class)->name('upload-file');

Route::prefix('file-pond')->group(function (): void {
    Route::post('/', [FilePondController::class, 'process'])->name('file-pond-process');
    Route::delete('/', [FilePondController::class, 'revert'])->name('file-pond-revert');
});

require __DIR__ . '/auth.php';
