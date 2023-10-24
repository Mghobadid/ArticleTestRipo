<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArticleController::class, 'index'])->name('home.index');
Route::get('/create', [ArticleController::class, 'create'])->name('home.create');
Route::post('/store', [ArticleController::class, 'store'])->name('home.store');

Route::get('/crypto',[\App\Http\Controllers\CryptoController::class,'index']);
Route::get('/crypto/{id}',[\App\Http\Controllers\CryptoController::class,'show'])->name('crypto.show');
