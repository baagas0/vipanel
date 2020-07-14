<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Admin;
use App\Deposit;
use App\Payment;
use App\Orders;
use App\Setting;
use App\News;
use App\Voucher;
use App\AdminLog;
use DataTables;
use IrvanKede;

class ApiController extends Controller
{
    public function postServices(){
        $data = IrvanKede::services();

        return DataTables::of($data->data)->escapeColumns([])->make(true);
    }

    public function postUsers(){
    	$data = User::all();

    	return DataTables::of($data)
        ->editColumn("balance", function ($data) {
            return "Rp".number_format($data->balance);
        })
    	->addColumn("status", function ($data) {
    		if ($data->banned_at != NULL) {
    			return 'Banned';
    		}else{
    			return 'Active';
    		}
    	})->make(true);
    }

    public function postOrders($type = NULL){
        if ($type == "all") {
            $data = Orders::orderBy('id', 'desc')->get();
        }elseif ($type == "waiting") {
           $data = Orders::where('status','Waiting')
            ->orderBy('id','desc')
            ->get();
        }elseif ($type == "success") {
            $data = Orders::where('status','success')
            ->orderBy('id','desc')
            ->get();
        }elseif ($type == "failed"){
            $data = Orders::where('status','failed')
            ->orderBy('id','desc')
            ->get();
        }else{
            $data = Orders::where('status','refund')
            ->orderBy('id','desc')
            ->get();
        }

        return DataTables::of($data)
        ->editColumn('created_at', function ($data) {
                return $data->created_at ? with(new Carbon($data->created_at))->format('j F Y H:i') : '';
        })->make(true);
    }

    public function postDeposits($type = NULL){
        if ($type == "waiting") {
            $data = Deposit::with('user','payment')
            ->where('status','Waiting')
            ->orderBy('id','desc')
            ->get();
        }elseif ($type == "success") {
           $data = Deposit::with('user','payment')
           ->where('status','Success')
            ->orderBy('id','desc')
            ->get();
        }elseif ($type == "failed") {
            $data = Deposit::with('user','payment')
            ->where('status','Failed')
            ->orderBy('id','desc')
            ->get();
        }else{
            $data = Deposit::with('user','payment')
            ->orderBy('id','desc')
            ->get();
        }   

        return DataTables::of($data)
        ->editColumn('created_at', function ($data) {
                return $data->created_at ? with(new Carbon($data->created_at))->format('j F Y H:i') : '';
        })
        ->editColumn("amount", function ($data) {
            return "Rp".number_format($data->amount);
        })->make(true);
    }

    public function postVouchers(){
        $data = Voucher::all();

        return DataTables::of($data)
        ->editColumn("min_amount", function ($data) {
            return "Rp".number_format($data->min_amount);
        })
        ->editColumn("max_discount", function ($data) {
            return $data->max_discount ? "Rp".number_format($data->max_discount) : '';
        })
        ->editColumn("amount", function ($data) {
           return $data->amount ? "Rp".number_format($data->amount) : '';
        })
        ->editColumn("expired_at", function ($data) {
            return $data->expired_at ? with(new Carbon($data->expired_at))->format('j F Y H:i') : '';
        })
        ->make(true);
    }

    public function postData(){
        $data = Admin::all();

        return DataTables::of($data)->make(true);
    }

    public function postNews(){
        $data = News::orderBy('id','desc')->get();

        return DataTables::of($data)
        ->escapeColumns([])
        ->make(true);
    }

    public function postPayments(){
        $data = Payment::all();

        return DataTables::of($data)
        ->editColumn("is_bank", function ($data) {
            if ($data->is_bank == 0) {
                return "NO";
            }else{
                return "YES";
            }
        })->make(true);
    }

    public function postSettings(){
        $data = Setting::all();

        return DataTables::of($data)->make(true);
    }

    public function postLogs(){
        $data = AdminLog::where('admin_id',auth('admin')->user()->id)->get();

        return DataTables::of($data)
        ->editColumn("created_at", function ($data) {
            return $data->created_at ? with(new Carbon($data->created_at))->format('j F Y H:i') : '';
        })->make(true);
    }
}
