<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration-success', function () {
    return view('auth.registration-success');
})->name('registration.success');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'check.status'])->name('dashboard');


// Route::prefix('admin')->middleware('auth')->group(function () {
    Route::middleware('auth', 'check.status')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('eleves', EleveController::class);
    Route::resource('users', UserController::class)->except(['show']); 
    Route::post('users/{user}/toggleActivation', [UserController::class, 'toggleActivation'])->name('users.toggleActivation');



});

require __DIR__.'/auth.php';
