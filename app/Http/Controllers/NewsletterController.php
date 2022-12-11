<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterRequest;
use App\Models\Newsletter;
use Inertia\Inertia;

class NewsletterController extends Controller
{
	public function index()
	{
		$newsletters = Newsletter::latest()->paginate(24);

		return Inertia::render('Newsletter/Index', [
			'newsletters' => $newsletters,
		]);
	}

	public function store(StoreNewsletterRequest $request)
	{
		$validated = $request->validated();
		Newsletter::create($validated);

		return redirect()->back();
	}

	public function destroy(Newsletter $newsletter)
		{
				$newsletter->delete();

		return redirect()->route('newsletters.index')->with([
			'success' => 'Newsletter Deleted successfull.'
		]);
	}
}
