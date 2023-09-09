<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(BlogController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('/{id}', 'show')->where(['id' => '[0-9]+'])->name('blog.show');
    Route::get('/{id}/edit', 'edit')->where(['id' => '[0-9]+'])->name('blog.edit')->middleware('auth');
    Route::patch('/{id}', 'update')->where(['id' => '[0-9]+'])->name('blog.update')->middleware('auth');
    Route::get('/{id}/destroy', 'destroy')->where(['id' => '[0-9]+'])->name('blog.destroy')->middleware('auth');
    Route::get('/create', 'create')->name('blog.create')->middleware('auth');
    Route::post('/', 'store')->name('blog.store')->middleware('auth');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function() {
    return view('fallback.index');
});

require __DIR__.'/auth.php';
