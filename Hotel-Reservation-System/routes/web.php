<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';


// ---------------------------------------------------------------- Admin Routes ---------------------------------------------------------------- //

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');


    Route::prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/', [RoomsController::class, 'index'])->name('index');
        Route::get('/create', [RoomsController::class, 'create'])->name('create');
    });
});

// Route::middleware(['auth', 'admin'])->group(function (){

// Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); 
// Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
// Route::get('/admin/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
// });