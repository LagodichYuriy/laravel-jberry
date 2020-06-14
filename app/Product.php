<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	const STATUS_ACTIVE  = 'active';
	const STATUS_ON_HOLD = 'on-hold';
	const STATUS_EXPIRED = 'expired';

	protected $fillable = ['status', 'monthly_inventory'];

	public $timestamps = false;

	public function usersProducts()
	{
		return $this->hasMany(UsersProduct::class);
	}
}
