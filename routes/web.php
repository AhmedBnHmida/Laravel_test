<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/properties', function () {
    return view('properties.index');
})->name('properties.index');

Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');

Route::get('/user', function () {
    return view('user'); // Ancienne welcome page devenue page utilisateur
})->name('user.properties');

require __DIR__.'/auth.php';
