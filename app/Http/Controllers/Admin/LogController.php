<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getIndex(){
		$data['page_title'] = "Log Activity";

		return view('admin.logs.index', $data);
	}
}
