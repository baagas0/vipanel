<?php

namespace App\Helpers;

use Request;
use App\AdminLog;
use App\UserLog;

class Activity
{
	public static function add($data)
	{
		if (auth('admin')->check()) {
			$log = New AdminLog;
			$log->admin_id = auth('admin')->user()->id;
		}else{
			$log = New UserLog;
			$log->user_id = auth()->user()->id;
		}

		$log->page 			= $data['page'];
		$log->description 	= $data['description'];
		$log->method 		= Request::method();
		$log->url 			= Request::fullUrl();
		$log->ip 			= Request::ip();
		$log->agent 		= Request::header('user-agent');
		$log->save();
	}

	public static function list()
	{
		if (auth('admin')->check()) {
			$data = AdminLog::where('admin_id',auth('admin')->user()->id);
		}else{
			$data = UserLog::where('user_id',auth()->user()->id);
		}
		
		return $data->orderBy('id','desc')->limit(10)->get();
	}

}