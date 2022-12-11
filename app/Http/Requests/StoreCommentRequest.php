<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'article_id' => ['required', 'integer', 'exists:App\Models\Article,id'],
			'user_id' => ['nullable', 'integer', 'exists:App\Models\User,id'],
			'user_name' => ['string', 'nullable', 'required_if:user_id,null'],
			'email' => ['email', 'nullable', 'required_if:user_id,null'],
			'content' => ['required', 'string'],
			'published' => ['boolean', 'nullable'],
		];
	}
}
