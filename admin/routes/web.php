<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Books\BookController;

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

Route::get('/', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('book',[ProfileController::class, 'destroy'])->only(['index', 'store']);
    Route::get('books/list',[BookController::class, 'booksList'])->name('book.list');
    Route::get('books/bulk-import-books',[BookController::class, 'bulkImportBooks'])->name('book.import');
    Route::resource('book',BookController::class);
});

require __DIR__.'/auth.php';
