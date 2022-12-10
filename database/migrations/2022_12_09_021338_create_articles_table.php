<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('articles', function (Blueprint $table) {
			$table->id();
			$table->foreignId('banner_id')->nullable()->constrained('assets');
			$table->string('title');
			$table->string('slug')->unique();
			$table->longText('content')->nullable();
			$table->text('excerpt')->nullable();
			$table->boolean('published')->default(true);
			$table->unsignedTinyInteger('read_time')->nullable();
			$table->unsignedInteger('view_count')->default(0);
			$table->timestamp('published_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('articles');
	}
};
