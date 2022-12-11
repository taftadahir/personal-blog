<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
	public function store(StoreCommentRequest $request)
	{
		$validated =  $request->validated();
		$comment = new Comment($validated);

		if (isset($validated['user_id'])) {
			$user = User::where('id', $validated['user_id'])->first();
			$comment->user()->associate($user);
		}

		$article = Article::where('id', $validated['article_id'])->first();
		$article->comments()->save($comment);

		return redirect()->back();
	}

	public function destroy(Comment $comment)
	{
	}
}
