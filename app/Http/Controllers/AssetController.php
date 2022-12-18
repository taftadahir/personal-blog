<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AssetController extends Controller
{
	public function index()
	{
		$assets = Asset::latest()->paginate(10);
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
		$hashName = $file->hashName();
		$file->storeAs('assets', pathinfo($hashName, PATHINFO_FILENAME) . '.' . $extension, 'public');

		Asset::create([
			'original_name' => $file->getClientOriginalName(),
			'file_name' => pathinfo($hashName, PATHINFO_FILENAME) . '.' . $extension,
			'extension' => $extension
		]);

		return redirect()->route('assets.index')->with([
			'success' => 'Asset Created successfull.'
		]);
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

	public function destroy(Asset $asset)
	{
		if (Storage::disk('public')-> exists('assets/' . $asset->file_name)) {
			Storage::disk('public')->delete('assets/' . $asset->file_name);
		}
		$asset->delete();

		return redirect()->route('assets.index')->with([
			'success' => 'Asset Deleted successfull.'
		]);
	}
}
