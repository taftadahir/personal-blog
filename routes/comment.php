<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::controller(CommentController::class)->name('comments.')->group(function () {
	Route::post('/comments', 'store')->name('store');

	Route::delete('/comments/{comment}', 'destroy')->name('destroy');
});
