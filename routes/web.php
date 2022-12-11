<?php

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (Request $request) {
	$articles = Article::with(['banner'])
		->published()
		->latest()
		->paginate(9);

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

Route::get('/single/{article:slug}', function (Article $article) {
	$article->update([
		'view_count' => $article->view_count + 1
	]);

	$articles = Article::with(['banner'])
		->published()
		->latest()
		->limit(3)
		->get()
		->except($article->id);

	$comments = Comment::where('article_id', $article->id)->with(['user'])->latest()->paginate(9);

	return Inertia::render('Single', [
		'article' => $article->load(['banner']),
		'articles' => $articles,
		'comments' => $comments,
	]);
})->name('single');

require __DIR__ . '/auth.php';
require __DIR__ . '/asset.php';
require __DIR__ . '/article.php';
require __DIR__ . '/comment.php';
require __DIR__ . '/newsletter.php';
