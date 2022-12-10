<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsletterController;

Route::controller(NewsletterController::class)->middleware(['auth'])->name('newsletters.')->group(function () {
	Route::get('/newsletters', 'index')->name('index');

	Route::delete('/newsletters/{newsletter}', 'destroy')->name('destroy');
});

Route::controller(NewsletterController::class)->name('newsletters.')->group(function () {
	Route::post('/newsletters', 'store')->name('store');
});
