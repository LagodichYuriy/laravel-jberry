<?php

namespace App\Observers;

use App\Notification;
use App\Product;

class ProductObserver
{
	public function updating(Product $product)
	{
		if ($product->isDirty('status'))
		{
			foreach ($product->usersProducts as $users_product)
			{
				Notification::triggerProductStatusChange($users_product->user_id, $users_product->product_id);
			}
		}
	}
}
