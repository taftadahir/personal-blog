<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsletterController;

Route::controller(NewsletterController::class)->middleware(['auth', 'admin'])->name('newsletters.')->group(function () {
	Route::get('/newsletters', 'index')->name('index');

	Route::get('/newsletters/create', 'create')->name('create');
	Route::post('/newsletters', 'store')->name('store');

	Route::get('/newsletters/{newsletter}/edit', 'edit')->name('edit');
	Route::put('/newsletters/{newsletter}', 'update')->name('update');

	Route::delete('/newsletters/{newsletter}', 'destroy')->name('destroy');
});
