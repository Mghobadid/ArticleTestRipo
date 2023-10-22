<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArticleController::class, 'index'])->name('home.index');
Route::get('/create', [ArticleController::class, 'create'])->name('home.create');
Route::post('/store', [ArticleController::class, 'store'])->name('home.store');

