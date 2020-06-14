<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Product;

class ProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();

		Product::query()->truncate();


		$faker = \Faker\Factory::create();


		$statuses =
		[
			Product::STATUS_EXPIRED,
			Product::STATUS_ON_HOLD,
			Product::STATUS_ACTIVE
		];

		for ($i = 0; $i < 500; $i++)
		{
			Product::create
			([
				'status' => $faker->randomElement($statuses),
				'monthly_inventory' => $faker->numberBetween(0, 5),
			]);
		}

		Schema::enableForeignKeyConstraints();
	}
}
