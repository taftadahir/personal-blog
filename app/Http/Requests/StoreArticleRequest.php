<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'banner' => ['nullable', 'integer', 'exists:App\Models\Asset,id'],
			'title' => ['bail', 'string', 'required'],
			'slug' => ['bail', 'string', 'required', 'unique:articles,slug'],
			'content' => ['string', 'nullable'],
			'excerpt' => ['string', 'nullable'],
			'published' => ['boolean', 'nullable'],
			'read_time' => ['integer', 'nullable', 'max:255'],
		];
	}
}
