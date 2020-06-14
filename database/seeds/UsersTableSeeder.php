<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();

		User::query()->truncate();

		$faker = \Faker\Factory::create();

		for ($i = 0; $i < 50; $i++)
		{
			User::create(['email' => $faker->email]);
		}

		Schema::enableForeignKeyConstraints();
	}
}
