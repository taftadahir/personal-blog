<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('comments', function (Blueprint $table) {
			$table->id();
			$table->foreignId('article_id')->constrained('articles');
			$table->foreignId('user_id')->nullable()->constrained('users');
			$table->string('user_name')->nullable();
			$table->string('email')->nullable();
			$table->longText('content')->nullable();
			$table->boolean('published')->default(true);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('comments');
	}
};
