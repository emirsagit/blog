<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Article\ArticleController;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('article', ArticleController::class);
