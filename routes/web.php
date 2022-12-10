<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (Request $request) {
	$articles = Article::with(['banner'])
		->latest()
		->paginate(12);

	return Inertia::render('Home', [
		'articles' => $articles,
		'filters' => $request->only('search'),
	]);
})->name('home');

Route::middleware('auth')->group(function () {

	Route::get('/dashboard', function () {
		return Inertia::render('Dashboard');
	})->name('dashboard');
});

Route::get('/single/{article:slug}', function () {
	return 'Single';
})->name('single');

require __DIR__ . '/auth.php';
require __DIR__ . '/asset.php';
require __DIR__ . '/article.php';
require __DIR__ . '/comment.php';
require __DIR__ . '/newsletter.php';
