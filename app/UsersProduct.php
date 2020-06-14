<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\HasCompositePrimaryKey;

class UsersProduct extends Model
{
	use HasCompositePrimaryKey;

	const STATUS_PENDING  = 'pending';
	const STATUS_APPROVED = 'approved';
	const STATUS_REJECTED = 'rejected';

	protected $fillable = ['user_id', 'product_id', 'status'];

	protected $primaryKey = ['user_id', 'product_id'];

	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
