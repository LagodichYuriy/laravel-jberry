<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationsType extends Model
{
	const TYPE_PRODUCT_INVENTORY_DEPLETED = 'product inventory depleted';
	const TYPE_PRODUCT_STATUS_CHANGE      = 'product status change';
	const TYPE_PRODUCT_APPROVED           = 'product approved';

	protected $fillable = ['type'];

	public $timestamps = false;
}
