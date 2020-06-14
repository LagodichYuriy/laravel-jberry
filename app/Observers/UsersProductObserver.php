<?php

namespace App\Observers;

use App\Notification;
use App\UsersProduct;

class UsersProductObserver
{
	/**
	 * Handle the users product "created" event.
	 *
	 * @param UsersProduct $users_product
	 *
	 * @return void
	 */
	public function created(UsersProduct $users_product)
	{
		$product = $users_product->product;

		if (!$product->monthly_inventory)
		{
			Notification::triggerProductInventoryDepleted($users_product->user_id, $product->id);
		}
	}

	/**
	 * Handle the users product "updated" event.
	 *
	 * @param UsersProduct $users_product
	 *
	 * @return void
	 */
	public function updated(UsersProduct $users_product)
	{
		$product = $users_product->product;

		if ($users_product->isDirty('monthly_inventory') and !$product->monthly_inventory)
		{
			Notification::triggerProductInventoryDepleted($users_product->user_id, $users_product->product_id);
		}

		if ($users_product->isDirty('status') and $users_product->status == UsersProduct::STATUS_APPROVED)
		{
			Notification::triggerProductApproved($users_product->user_id, $users_product->product_id);
		}
	}
}
