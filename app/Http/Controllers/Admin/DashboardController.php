<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Deposit;
use App\Order;
use IrvanKede;

class DashboardController extends Controller
{
	public function getIndex(){
		$data['page_title'] = 'Dashboard';
		$data['irvankede'] = IrvanKede::profile();
		$data['user_total'] = User::count();
		$data['deposit_total'] = Deposit::where('status','Success')->sum('amount');
		$data['order_total'] = Order::whereNotNull('approved_at')->count();

		return view('admin.dashboard.index', $data);
	}
}
