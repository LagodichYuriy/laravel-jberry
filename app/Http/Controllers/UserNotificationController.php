<?php

namespace App\Http\Controllers;

use App\Notification;

class UserNotificationController extends Controller
{
	public function index($user_id)
	{
		return Notification::where(['user_id' => $user_id, 'is_viewed' => false])->with(['type'])->get();
	}

	public function store($user_id, Notification $notification)
	{
		$notification->is_viewed = true;

		return $notification->save();
	}
}
