<?php

use App\Notification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Product;
use App\User;
use App\UsersProduct;

class UsersProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();

		UsersProduct::query()->truncate();


		$faker = \Faker\Factory::create();

		for ($i = 0; $i < 500; $i++)
		{
			$user = User::inRandomOrder()->firstOrFail();
			$product = Product::inRandomOrder()->firstOrFail();

			UsersProduct::firstOrCreate
			([
				'user_id' => $user->id,
				'product_id' => $product->id
			],
			[
				'status' => $faker->randomElement
				([
					UsersProduct::STATUS_PENDING,
					UsersProduct::STATUS_REJECTED,
					UsersProduct::STATUS_APPROVED
				])
			]);


			if ($faker->numberBetween(0, 5) == 2)
			{
				$product->status = Product::STATUS_ACTIVE;
				$product->save();
			}

			if ($faker->numberBetween(0, 5) == 3)
			{
				UsersProduct::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['status' => UsersProduct::STATUS_APPROVED]);

				Notification::triggerProductApproved($user->id, $product->id);
			}
		}

		Schema::enableForeignKeyConstraints();
	}
}
