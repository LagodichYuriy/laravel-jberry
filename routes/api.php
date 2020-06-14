<?php

use Illuminate\Support\Facades\Route;

Route::get ('users', 'UserController@index');
Route::get ('users/{user_id}/notifications', 'UserNotificationController@index');
Route::post('users/{user_id}/notifications/{notification}', 'UserNotificationController@store');

Route::get ('products', 'ProductController@index');

Route::get ('notifications', 'NotificationController@index');