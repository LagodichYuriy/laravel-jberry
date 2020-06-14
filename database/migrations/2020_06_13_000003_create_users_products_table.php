<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\UsersProduct;

class CreateUsersProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_products', function (Blueprint $table)
		{
			$table->integer('user_id')->index();
			$table->integer('product_id')->index();
			$table->enum('status',
			[
				UsersProduct::STATUS_PENDING,
				UsersProduct::STATUS_APPROVED,
				UsersProduct::STATUS_REJECTED
			])->index();

			$table->unique(['user_id', 'product_id']);

			$table->foreign('user_id')   ->references('id')->on('users')   ->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users_products');
	}
}
