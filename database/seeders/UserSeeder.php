<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		User::create(
			[
				'name' => 'Admin',
				'email' => 'admin@blog.com',
				'password' => bcrypt('password'),
			]
		);
	}
}
