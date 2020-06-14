<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\NotificationsType;

class NotificationsTypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();

		NotificationsType::query()->truncate();

		NotificationsType::firstOrCreate(['type' => NotificationsType::TYPE_PRODUCT_INVENTORY_DEPLETED]);
		NotificationsType::firstOrCreate(['type' => NotificationsType::TYPE_PRODUCT_STATUS_CHANGE]);
		NotificationsType::firstOrCreate(['type' => NotificationsType::TYPE_PRODUCT_APPROVED]);

		Schema::enableForeignKeyConstraints();
	}
}