<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Admin\Me\AdminMeController;
use App\Http\Controllers\Admin\Tag\AdminTagController;
use App\Http\Controllers\Admin\Home\AdminHomeController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Author\AdminAuthorController;
use App\Http\Controllers\Admin\Article\AdminArticleController;
use App\Http\Controllers\Admin\Notification\AdminNotificationController;
use App\Http\Controllers\Admin\Administrator\AdminAdministratorController;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('article', ArticleController::class);
Route::resource('contact', ContactController::class);

Route::middleware(['admin', 'auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::resource('/notification', AdminNotificationController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/author', AdminAuthorController::class);
    Route::resource('/admin', AdminAdministratorController::class);
    Route::resource('/me', AdminMeController::class);
    Route::resource('/tag', AdminTagController::class);
    Route::resource('/article', AdminArticleController::class, [
        'as' => 'admin'
    ]);
});

Auth::routes();


