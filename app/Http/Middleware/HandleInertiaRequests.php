<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
	protected $rootView = 'app';

	public function version(Request $request)
	{
		return parent::version($request);
	}

	public function share(Request $request)
	{
		return array_merge(parent::share($request), [
			'auth' => [
				'user' => fn () => $request->user()
					? $request->user()->only('id', 'name')
					: null,
				'canLogin' => Route::has('login'),
				'canRegister' => Route::has('register'),
			],
			'flash' => [
				'success' => session('success'),
				'error' => session('error'),
				'warning' => session('warning'),
				'info' => session('info'),
			],
			'ziggy' => function () use ($request) {
				return array_merge((new Ziggy)->toArray(), [
					'location' => $request->url(),
				]);
			},
		]);
	}
}
