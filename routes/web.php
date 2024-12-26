<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/sitemap', [\App\Http\Controllers\SitemapController::class, 'index']);

Route::post('/form-submit', [FormController::class, 'formSubmit'])->name('form-submit');
Route::post('/sms-submit', [FormController::class, 'sendSms'])->name('sms-submit');
Route::get('/tesekkurler', function () {
    return view('front.layout.tesekkurler');
});
