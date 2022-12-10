<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use HasFactory, SoftDeletes;

	public const DATE_FORMAT = 'd M, Y';

	protected $fillable = [
		'title',
		'slug',
		'content',
		'excerpt',
		'read_time',
		'published',
		'published_at',
		'view_count',
	];

	protected $casts = [
		'published' => 'boolean',
	];

	public function scopePublished($query)
	{
		return $query->where('published', true);
	}

	protected function publishedAt(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value ? Carbon::parse($value)->format(Article::DATE_FORMAT) : null,
		);
	}

	public function banner()
	{
		return $this->belongsTo(Asset::class, 'banner_id');
	}
}
