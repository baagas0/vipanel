<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deposit;
use App\User;
use Activity;

class DepositsController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Data Deposits";

    	return view('admin.deposits.index', $data);
    }

    public function getWaiting(){
        $data['page_title'] = "Data Deposits: Waiting Payments";

        return view('admin.deposits.waiting', $data);
    }

    public function postApprove($id){
        $data = Deposit::findOrFail($id);
        $data->status = "Success";
        $data->save();

        $user = User::findOrFail($data->user->id);
        $user->balance += $data->amount_received;
        $user->save();

        Activity::add([
            'page' => 'Waiting Payments',
            'description' => 'Mempersetujui Deposit ID: #'.$data->id
        ]);

        return response()->json(true);
    }

    public function getSuccess(){
    	$data['page_title'] = "Data Deposits: Success Payments";

        return view('admin.deposits.success', $data);
    }

    public function getFailed(){
    	$data['page_title'] = "Data Deposits: Failed Payments";

        return view('admin.deposits.failed', $data);
    }
}
