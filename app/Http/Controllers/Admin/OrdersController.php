<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Data Orders";

    	return view('admin.orders.all', $data);
    }

    public function getWaiting(){
        $data['page_title'] = "Data Orders: Waiting Orders";

        return view('admin.orders.waiting', $data);
    }

    public function postAccept(){

    }

    public function postReject(){
    	
    }

    public function getSuccess(){
    	$data['page_title'] = "Data Orders: Success Orders";

        return view('admin.orders.success', $data);
    }

    public function getFailed(){
    	$data['page_title'] = "Data Orders: Failed Orders";

        return view('admin.orders.failed', $data);
    }
}
