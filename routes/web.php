<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'password'])->name('password');
    Route::post('password-update', [ProfileController::class, 'updatePassword'])->name('change.password');

    Route::get('status-active/{table}/{id}',[\App\Http\Controllers\HomeController::class,'statusUpdate'])->name('status.update');

    //Category list functions
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    //Category Create functions
    Route::post('category-store', [CategoryController::class, 'store'])->name('category.store');
    //Category edit functions
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    //Category update functions
    Route::post('category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    //Category delete functions
    Route::delete('category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Author list functions
    Route::get('authors', [AuthorController::class, 'index'])->name('author.index');
    //Author Create functions
    Route::post('author-store', [AuthorController::class, 'store'])->name('author.store');
    //Author edit functions
    Route::get('author-edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    //Author update functions
    Route::post('author-update/{id}', [AuthorController::class, 'update'])->name('author.update');
    //Author delete functions
    Route::delete('author-delete/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');

    //book list functions
    Route::get('books', [BookController::class, 'index'])->name('book.index');
    //book Create functions
    Route::get('book-create', [BookController::class, 'create'])->name('book.create');
    //book Store functions
    Route::post('book-store', [BookController::class, 'store'])->name('book.store');
    //book edit functions
    Route::get('book-edit/{id}', [BookController::class, 'edit'])->name('book.edit');
    //book update functions
    Route::post('book-update/{id}', [BookController::class, 'update'])->name('book.update');
    //book delete functions
    Route::delete('book-delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    //modify book function
    Route::post('stock-modify', [BookController::class, 'stockModify'])->name('stock.modify');

    //order list
    Route::get('order-list', [OrderController::class, 'index'])->name('order.index');
    //order status change
    Route::get('order-view/{id}', [OrderController::class, 'show'])->name('order.show');
    //order status change
    Route::get('order-status-change/{id}', [OrderController::class, 'statusChange'])->name('status.change');
});


require __DIR__ . '/auth.php';
