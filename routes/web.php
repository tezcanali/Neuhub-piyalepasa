<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use App\Http\Middleware\SetLocale;

Route::group(['middleware' => ['web', SetLocale::class]], function () {
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

Route::get('/sitemap', [\App\Http\Controllers\SitemapController::class, 'index']);

Route::post('/form-submit', [FormController::class, 'formSubmit'])->name('form-submit');
Route::post('/sms-submit', [FormController::class, 'sendSms'])->name('sms-submit');
Route::get('/tesekkurler', [FormController::class, 'showTesekkurler'])->name('tesekkurler');
Route::get('/en/thank-you', [FormController::class, 'showThankyou'])->name('thank-you');
