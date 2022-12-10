<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Inertia\Inertia;

class ArticleController extends Controller
{
	public function index()
	{
	}

	public function create()
	{
		return Inertia::render('Article/Edit');
	}

	public function store(StoreArticleRequest $request)
	{
	}

	public function show(Article $article)
	{
	}

	public function edit(Article $article)
	{
	}

	public function update(UpdateArticleRequest $request, Article $article)
	{
	}

	public function destroy(Article $article)
	{
	}
}
