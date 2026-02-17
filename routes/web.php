<?php

use App\Http\Controllers\Admin\QuoteAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing', [
        'brand' => [
            'name' => 'Print on the wall',
            'slogan' => 'You think it, we print it',
            'primary' => '#c22229',
        ],
    ]);
})->name('home');

Route::get('/privacy', fn () => Inertia::render('Legal/Privacy'))->name('legal.privacy');
Route::get('/cookies', fn () => Inertia::render('Legal/Cookies'))->name('legal.cookies');
Route::get('/voorwaarden', fn () => Inertia::render('Legal/Terms'))->name('legal.terms');

Route::post('/offerte', [QuoteRequestController::class, 'store'])->name('quote.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('admin.dashboard');

    Route::get('/offertes', [QuoteAdminController::class, 'index'])->name('admin.quotes.index');
    Route::get('/offertes/{quote}', [QuoteAdminController::class, 'show'])->name('admin.quotes.show');
    Route::get('/offertes/{quote}/bewerken', [QuoteAdminController::class, 'edit'])->name('admin.quotes.edit');
    Route::put('/offertes/{quote}', [QuoteAdminController::class, 'update'])->name('admin.quotes.update');
    Route::delete('/offertes/{quote}', [QuoteAdminController::class, 'destroy'])->name('admin.quotes.destroy');

    // uploads
    Route::get('/offertes/{quote}/download', [QuoteAdminController::class, 'download'])->name('admin.quotes.download');
    Route::get('/offertes/{quote}/preview', [QuoteAdminController::class, 'preview'])->name('admin.quotes.preview');
});

require __DIR__.'/auth.php';
