<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('index');
})->name('home.index');
Route::get('/create', [ArticleController::class, 'create'])->name('home.create');
Route::post('/store', [ArticleController::class, 'store'])->name('home.store');
Route::get('/show/{article}', [ArticleController::class, 'show'])->name('home.show');
Route::post('/update/{article}', [ArticleController::class, 'update'])->name('home.update');

Route::get('/crypto',[\App\Http\Controllers\CryptoController::class,'index']);
Route::get('/crypto/{id}',[\App\Http\Controllers\CryptoController::class,'show'])->name('crypto.show');
