<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaction', function (Blueprint $table)
		{
			$table->integer('product_id')->index();
			$table->integer('user_id')->index();
			$table->dateTime('created_at')->useCurrent()->index();

			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('user_id')   ->references('id')->on('users')   ->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('transaction');
	}
}
