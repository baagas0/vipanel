<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\Payment;
use Activity;

class DepositController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Deposit";
    	$data['data'] = Deposit::all();
        $data['payments'] = Payment::all();

    	return view('user.deposit.index', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'amount' => 'required|integer|min:10000',
        ]);

        $check = Deposit::where([
            'user_id' => auth()->user()->id,
            'status' => 'Waiting'
        ])->first();

        if ($check) {
            return redirect()->back()->with([
                'message_type' => 'error',
                'message' => 'Silahkan Selesaikan Pembayaran Deposit #'.$check->id.' Terlebih Dahulu!'
            ]);
        }

        $data = New Deposit;
        $data->user_id = auth()->user()->id;
        $data->payment_id = $request->payment_id;
        $data->amount = uniqAmount($request->amount);
        $data->amount_received = amountReceived($request->payment_id,$request->amount);
        $data->save();

        Activity::add([
            'page' => 'Deposit',
            'description' => 'New Deposit ID: #' . $data->id
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message'      => 'Berhasil!',
            'id'           => $data->id,
            'payment'      => $data->payment,
            'amount'      => number_format($data->amount),
            'amount_received'     => number_format($data->amount_received)
        ]);
    }

    public function getHistory(){
    	$data['page_title'] = "Deposits History";
    	$data['data'] = Deposit::all();

        foreach ($data['data'] as $d) {
            if ($d->status == 'Waiting') {
                $d->badge = 'warning';
            }elseif ($d->status == 'Success') {
                $d->badge = 'success';
            }else{
                $d->badge = 'danger';
            }
        }

    	return view('user.deposit.history', $data);
    }

    public function postAmountReceived(Request $request){
        $response = number_format(amountReceived($request->payment_id,$request->amount));

        return response()->json($response);
    }
}
