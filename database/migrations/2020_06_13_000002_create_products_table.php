<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Product;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table)
		{
			$table->integer('id')->autoIncrement();
			$table->enum('status',
			[
				Product::STATUS_ACTIVE,
				Product::STATUS_ON_HOLD,
				Product::STATUS_EXPIRED
			])->index();

			$table->integer('monthly_inventory')->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}
}
