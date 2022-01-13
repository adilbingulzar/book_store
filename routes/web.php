<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksStoreController;

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


Route::get('/', [BooksStoreController::class,'index'])->name('index');
Route::get('/search', [BooksStoreController::class,'index'])->name('books.store.search');
Route::post('/store', [BooksStoreController::class,'store'])->name('books.store');
Route::put('/update/{id}', [BooksStoreController::class,'update'])->name('books.update');
Route::delete('/record/delete/{id}', [BooksStoreController::class,'destroy'])->name('books.store.delete');


// Route::get('/array-rotation', [BooksStoreController::class,'index'])->name('array.rotation');

Route::get('/array-rotation', function () {
    return view('array_rotation');
    
})->name('array.rotation');