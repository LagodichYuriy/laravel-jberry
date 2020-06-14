<?php

namespace App\Http\Controllers;

use App\Notification;

class NotificationController extends Controller
{
	public function index()
	{
		return Notification::with(['product', 'type'])->get();
	}
}
