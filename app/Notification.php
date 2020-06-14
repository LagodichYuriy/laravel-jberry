<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $fillable = ['user_id', 'product_id', 'type_id', 'is_viewed'];

	public $timestamps = false;


	public function product() { return $this->belongsTo(Product::class);           }
	public function user()    { return $this->belongsTo(User::class);              }
	public function type()    { return $this->belongsTo(NotificationsType::class); }


	public static function findUnviewedByUserID(int $user_id)
	{
		return static::where(['user_id', $user_id, 'is_viewed' => false]);
	}

	public static function trigger(int $user_id, int $product_id, string $type)
	{
		$type = NotificationsType::where('type', $type)->first();

		if ($type === null)
		{
			return null;
		}

		return static::create
		([
			'user_id' => $user_id,
			'product_id' => $product_id,
			'type_id' => $type->id
		]);
	}

	public static function triggerProductInventoryDepleted($user_id, $product_id) { return static::trigger($user_id, $product_id, NotificationsType::TYPE_PRODUCT_INVENTORY_DEPLETED); }
	public static function triggerProductStatusChange     ($user_id, $product_id) { return static::trigger($user_id, $product_id, NotificationsType::TYPE_PRODUCT_STATUS_CHANGE); }
	public static function triggerProductApproved         ($user_id, $product_id) { return static::trigger($user_id, $product_id, NotificationsType::TYPE_PRODUCT_APPROVED); }

	public static function markAsViewed($notification_id)
	{
		return static::where('id', $notification_id)->update(['is_viewed' => true]);
	}
}
