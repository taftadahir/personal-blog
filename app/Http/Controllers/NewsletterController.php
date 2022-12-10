<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
	public function index()
	{
	}

	public function store(StoreNewsletterRequest $request)
	{
		$validated = $request->validated();
		Newsletter::create($validated);

		return redirect()->back();
	}

	public function destroy(Newsletter $newsletter)
	{
	}
}
