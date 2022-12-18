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
				'name' => 'Taftadjani Dahirou',
				'email' => 'taftadjani@gmail.com',
				'password' => '$2y$10$nGCIxuqacyCcjFihJBUSC.pvEM3OGHRCz3npv0/hWzCEqsKhGD1fi',
			]
		);
	}
}
