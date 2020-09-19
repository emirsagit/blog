<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Admin\Home\AdminHomeController;
use App\Http\Controllers\Admin\Notification\AdminNotificationController;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('article', ArticleController::class);
Route::resource('contact', ContactController::class);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');
    Route::resource('notification', AdminNotificationController::class);
});
