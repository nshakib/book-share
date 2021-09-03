<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-20 20:50:40
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-09-03 11:13:25
 */


use App\Http\Controllers\PagesController;
use App\Http\Controllers\BooksController;

use App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/single', [BooksController::class, 'show'])->name('books.show');


Route::get('/books/categories/{slug}', [CategoriesController::class, 'show'])->name('categories.show');


// Admin Part

Route::prefix('admin')->group(function () {
    Route::get('/', [Backend\PagesController::class,'index'])->name('admin.index');

    //books part
    Route::prefix('books')->group(function () {
        Route::get('/', [Backend\BooksController::class,'index'])->name('admin.books.index');
        //Route::get('/{id}', [Backend\BooksController::class,'show'])->name('admin.books.show');
        Route::get('/create', [Backend\BooksController::class,'create'])->name('admin.books.create');
        Route::post('/store', [Backend\BooksController::class,'store'])->name('admin.books.store');

    });

    //Author part
    Route::prefix('authors')->group(function () {
        Route::get('/', [Backend\AuthorsController::class,'index'])->name('admin.authors.index');
        Route::post('/store', [Backend\AuthorsController::class,'store'])->name('admin.authors.store');

        Route::get('/{id}', [Backend\AuthorsController::class,'show'])->name('admin.authors.show');
        Route::post('/update/{id}', [Backend\AuthorsController::class,'update'])->name('admin.authors.update');
        Route::post('/delete/{id}', [Backend\AuthorsController::class,'destroy'])->name('admin.authors.delete');

    });

    //Category part
    Route::prefix('categories')->group(function () {
        Route::get('/', [Backend\CategoriesController::class,'index'])->name('admin.categories.index');
        Route::post('/store', [Backend\CategoriesController::class,'store'])->name('admin.categories.store');

        Route::get('/{id}', [Backend\CategoriesController::class,'show'])->name('admin.categories.show');
        Route::post('/update/{id}', [Backend\CategoriesController::class,'update'])->name('admin.categories.update');
        Route::post('/delete/{id}', [Backend\CategoriesController::class,'destroy'])->name('admin.categories.delete');

    });

    //Publishers part
    Route::prefix('publishers')->group(function () {
        Route::get('/', [Backend\PublishersController::class,'index'])->name('admin.publishers.index');
        Route::post('/store', [Backend\PublishersController::class,'store'])->name('admin.publishers.store');

        Route::get('/{id}', [Backend\PublishersController::class,'show'])->name('admin.publisher.show');
        Route::post('/update/{id}', [Backend\PublishersController::class,'update'])->name('admin.publisher.update');
        Route::post('/delete/{id}', [Backend\PublishersController::class,'destroy'])->name('admin.publisher.delete');

    });
});
