<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfilePageController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/category/{category_id}', [ArticleController::class, 'getArticlesByCategory']);

// Article routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfilePageController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfilePageController::class, 'update'])->name('profile.update');
});
