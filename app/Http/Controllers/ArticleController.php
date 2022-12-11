<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Asset;
use Carbon\Carbon;
use Inertia\Inertia;

class ArticleController extends Controller
{
	public function index()
	{
		$articles = Article::with(['banner'])
			->latest()
			->paginate(8);

		return Inertia::render('Article/Index', [
			'articles' => $articles,
		]);
	}

	public function create()
	{
		$assets = Asset::all();
		return Inertia::render('Article/Create', [
			'assets' => $assets,
		]);
	}

	public function store(StoreArticleRequest $request)
	{
		$validated = $request->validated();

		if (isset($validated['published']) && $validated['published']) {
			$validated['published_at'] = Carbon::now();
		}

		$article = new Article($validated);

		if (isset($validated['banner'])) {
			$banner = Asset::where('id', $validated['banner'])->first();
			$article->banner()->associate($banner);
		}

		$article->save();

		return redirect()->route('articles.index')->with([
			'success' => 'Article created successfull.'
		]);
	}

	public function show(Article $article)
	{
	}

	public function edit(Article $article)
	{
		$assets = Asset::all();
		return Inertia::render('Article/Edit', [
			'assets' => $assets,
			'article' => $article
		]);
	}

	public function update(UpdateArticleRequest $request, Article $article)
	{
		$validated = $request->validated();

		if (isset($validated['published']) && $validated['published']) {
			$validated['published_at'] = Carbon::now();
		}

		if (isset($validated['banner'])) {
			$banner = Asset::where('id', $validated['banner'])->first();
			$article->banner()->associate($banner);
		}

		$article->update($validated);

		return redirect()->route('articles.index')->with([
			'success' => 'Article created successfull.'
		]);
	}

	public function destroy(Article $article)
	{
	}
}
