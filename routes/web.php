<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/',[\App\Http\Controllers\ArticleController::class,'index'])->name('article.index');
Route::get('/article/{article}',[\App\Http\Controllers\ArticleController::class,'show'])->name('article.show');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/articles',[\App\Http\Controllers\ArticleController::class,'create'])->name('article.create');
    Route::post('/articles',[\App\Http\Controllers\ArticleController::class,'store'])->name('article.store');

    Route::get('/dashboard',[\App\Http\Controllers\ArticleController::class,'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';
