<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call
		([
			UsersTableSeeder::class,
			NotificationsTypesTableSeeder::class,
			NotificationsTableSeeder::class,
			ProductsTableSeeder::class,
			UsersProductsTableSeeder::class
		]);
    }
}
