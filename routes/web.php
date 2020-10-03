<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Me\MeController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Admin\Me\AdminMeController;
use App\Http\Controllers\Admin\Tag\AdminTagController;
use App\Http\Controllers\Admin\Home\AdminHomeController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Author\AdminAuthorController;
use App\Http\Controllers\Admin\Setting\AdminSettingController;
use App\Http\Controllers\Admin\Article\AdminArticleController;
use App\Http\Controllers\Admin\Notification\AdminNotificationController;
use App\Http\Controllers\Admin\Administrator\AdminAdministratorController;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('article', ArticleController::class);
Route::post('article/search', [ArticleController::class, 'search'])->name('article.search');
Route::resource('contact', ContactController::class);
Route::resource('user', UserController::class);
Route::resource('me', MeController::class);
Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
Route::delete('comment', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::middleware(['admin', 'auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::resource('/notification', AdminNotificationController::class);
    Route::resource('/author', AdminAuthorController::class);
    Route::resource('/admin', AdminAdministratorController::class);
    Route::resource('/tag', AdminTagController::class);
    Route::resource('/setting', AdminSettingController::class);
    Route::resource('/me', AdminMeController::class, [
        'as' => 'admin'
    ]);
    Route::resource('/article', AdminArticleController::class, [
        'as' => 'admin'
    ]);
    Route::resource('/user', AdminUserController::class, [
        'as' => 'admin'
    ]);
});

Auth::routes();


