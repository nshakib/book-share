<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-20 20:50:40
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-27 09:35:52
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


// Admin Part
Route::get('admin', [Backend\PagesController::class,'index'])->name('admin.index');
