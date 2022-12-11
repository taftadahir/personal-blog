<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;

class AssetController extends Controller
{
	public function index()
	{
		$assets = Asset::latest()->paginate(9);
		return Inertia::render('Asset/Index', [
			'assets' => $assets,
		]);
	}

	public function create()
	{
		return Inertia::render('Asset/Create');
	}

	public function store(StoreAssetRequest $request)
	{
		$request->validated();

		$file = $request->file('asset');
		$extension = $file->clientExtension();
		$file->store('assets', 'public');
		$hashName = $file->hashName();

		Asset::create([
			'original_name' => $file->getClientOriginalName(),
			'file_name' => $hashName,
			'extension' => $extension
		]);

		return redirect()->route(RouteServiceProvider::DASHBOARD);
	}

	public function show(Asset $asset)
	{
	}

	public function edit(Asset $asset)
	{
		return Inertia::render('Asset/Edit', [
			'asset' => $asset
		]);
	}

	public function update(UpdateAssetRequest $request, Asset $asset)
	{
	}

	public function destroy(Asset $asset)
	{
	}
}
