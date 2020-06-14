<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Notification;

class CreateNotificationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function (Blueprint $table)
		{
			$table->integer('id')->autoIncrement();
			$table->integer('user_id')->index();
			$table->integer('product_id')->index();
			$table->integer('type_id')->index();
			$table->boolean('is_viewed')->default(false)->index();
			$table->dateTime('created_at')->useCurrent()->index();

			$table->foreign('user_id')   ->references('id')->on('users')              ->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('product_id')->references('id')->on('products')           ->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('type_id')   ->references('id')->on('notifications_types')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('notifications');
	}
}
