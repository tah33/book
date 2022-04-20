<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnOrderController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');

//Admin Panel
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'password'])->name('password');
    Route::post('password-update', [ProfileController::class, 'updatePassword'])->name('change.password');

    Route::get('status-active/{table}/{id}', [HomeController::class, 'statusUpdate'])->name('status.update');
    Route::get('status-inactive/{table}/{id}', [HomeController::class, 'statusInactive'])->name('status.inactive');

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
    //order invoice view
    Route::get('order-view/{id}', [OrderController::class, 'show'])->name('order.show');
    //order status change
    Route::get('order-status-change/{id}', [OrderController::class, 'statusChange'])->name('status.change');

    //order list
    Route::get('return-order-list', [ReturnOrderController::class, 'index'])->name('return.index');
    //request return order
    Route::post('request-return', [ReturnOrderController::class, 'requestStore'])->name('request.return');
    //reject return order
    Route::get('reject-return/{id}', [ReturnOrderController::class, 'reject'])->name('reject.return');

    //setting view
    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    //store settings data
    Route::post('store-settings', [SettingController::class, 'store'])->name('setting.store');

    //sales report data
    Route::get('sales-report', [\App\Http\Controllers\ReportController::class, 'salesReport'])->name('sales.report');

    //customer list
    Route::get('customers', [\App\Http\Controllers\HomeController::class, 'customer'])->name('customer.index');
});

Route::get('all-books', [HomeController::class, 'allBooks'])->name('all.books');
Route::get('category-books/{id}', [HomeController::class, 'categoryBooks'])->name('category.books');
Route::get('author-books/{id}', [HomeController::class, 'authorBooks'])->name('author.books');
Route::get('book-details/{id}', [HomeController::class, 'bookDetails'])->name('books.details');
Route::post('search-book', [HomeController::class, 'searchBook'])->name('search.book');

require __DIR__ . '/auth.php';
