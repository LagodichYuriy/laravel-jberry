<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Notification;

class NotificationsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();

		Notification::query()->truncate();

		Schema::enableForeignKeyConstraints();
	}
}