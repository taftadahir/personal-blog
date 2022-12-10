<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'original_name',
		'file_name',
		'extension'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'banner_id');
	}
}
