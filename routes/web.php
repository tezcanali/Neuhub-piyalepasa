<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BeforeAfterController;
use App\Http\Controllers\FormController;

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
// Route::get('/blog-category/{slug}', [BlogController::class, 'category']);
Route::get('/doctors/{slug}', [DoctorController::class, 'show']);
// Route::get('/teams/{slug}', [TeamController::class, 'show']);
/* Route::prefix('before-after')->group(function () {
    Route::get('/category/{slug}', [BeforeAfterController::class, 'categoryIndex']);
    Route::get('/{slug}', [BeforeAfterController::class, 'show']);
}); */

Route::post('form-submit', [FormController::class, 'store'])->name('form-submit');
Route::get('/sitemap', [\App\Http\Controllers\SitemapController::class, 'index']);

