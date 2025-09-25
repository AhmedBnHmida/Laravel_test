<?php
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
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
Route::post('/properties/{property}/reserve', [PropertyController::class, 'createReservation'])->name('properties.reserve');
Route::post('/properties/{property}/check-availability', [PropertyController::class, 'checkAvailability'])->name('properties.check-availability');

Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])
    ->name('bookings.cancel');

Route::get('/user', function () {
    return view('user'); // Ancienne welcome page devenue page utilisateur
})->name('user.properties');

require __DIR__.'/auth.php';
