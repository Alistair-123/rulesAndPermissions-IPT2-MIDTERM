<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\Record;

use App\Http\Controllers\RecordController; // Import the RecordController

// Events Listing
Route::get('/events', [RecordController::class, 'index'])
    ->name('events.index')
    ->middleware(['auth', 'can:view-events']);

// Group routes that require `manage-events` permission (Admins Only)
Route::middleware(['auth', 'can:manage-events'])->group(function () {
    Route::get('/events/{record}/edit', [RecordController::class, 'edit'])->name('events.edit');
    Route::put('/events/{record}', [RecordController::class, 'update'])->name('events.update');
    Route::delete('/events/{record}', [RecordController::class, 'destroy'])->name('events.destroy');
});
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/transaction', function () {
    return view('transaction.index');
})->name('transaction')->middleware(['auth', 'can:manage-transactions']);

Route::get('/profile', function () {
    return view('profile.index');
})->name('profile')->middleware(['auth']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
