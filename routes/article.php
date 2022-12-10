<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::controller(ArticleController::class)->name('articles.')->group(function () {
});

Route::controller(ArticleController::class)->middleware(['auth'])->name('articles.')->group(function () {
	Route::get('/articles', 'index')->name('index');

	Route::get('/articles/create', 'create')->name('create');
	Route::post('/articles', 'store')->name('store');

	Route::get('/articles/{article}/edit', 'edit')->name('edit');
	Route::put('/articles/{article}', 'update')->name('update');

	Route::delete('/articles/{article}', 'destroy')->name('destroy');
});
