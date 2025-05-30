<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BookController::class, 'book'])->name('dashboard');
    Route::get('/book/add', [BookController::class, 'book_add'])->name('book.add');
    Route::post('/book/store', [BookController::class, 'book_store'])->name('book.store');
    Route::get('/book/edit/{book_id}', [BookController::class, 'book_edit'])->name('book.edit');
    Route::post('/book/update', [BookController::class, 'book_update'])->name('book.update');
    Route::get('/book/delete/{book_id}', [BookController::class, 'book_delete'])->name('book.delete');
    Route::get('/book/info/{book_id}', [BookController::class, 'book_info'])->name('book.info');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
