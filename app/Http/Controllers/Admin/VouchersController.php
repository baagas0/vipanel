<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Voucher;
use Activity;

class VouchersController extends Controller
{
	public function getIndex(){
		$data['page_title'] = "Data Vouchers";

		return view('admin.vouchers.index', $data);
	}

	public function getAdd(){
		$data['page_title'] = "Add Voucher";

        return view('admin.vouchers.form', $data);
	}

	public function postAdd(Request $request){
		$request->validate([
            'type' => 'required_with:Percent,Amount',
            'code' => 'required|min:5|unique:vouchers',
            'min_amount' => 'required|numeric',
            'percent' => 'nullable|integer',
            'max_discount' => 'nullable|numeric',
            'amount' => 'nullable|integer',
            'quota' => 'required|integer',
            'expired_at' => 'date|required|'
        ]);

		$data = New Voucher;
		$data->type = $request->type;
		$data->code = $request->code;
		$data->min_amount = $request->min_amount;
		$data->percent = $request->percent;
		$data->max_discount = $request->max_discount;
		$data->amount = $request->amount;
		$data->quota = $request->quota;
		$data->expired_at = $request->expired_at;
		$data->save();

		Activity::add([
            'page' => 'Add Voucher',
            'description' => 'Menambahkan Voucher Baru: '.$data->code
        ]);

        return redirect()->route('admin.vouchers')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function getEdit($id){
		$data['page_title'] = "Edit Voucher";
        $data['data'] = Voucher::findOrFail($id);

        return view('admin.vouchers.form', $data);
	}

	public function postEdit($id, Request $request){
		$request->validate([
            'type' => 'required_with:Percent,Amount',
            'code' => 'required|min:5|unique:vouchers,code,'.$id,
            'min_amount' => 'required|numeric',
            'percent' => 'nullable|integer',
            'max_discount' => 'nullable|numeric',
            'amount' => 'nullable|integer',
            'quota' => 'required|integer',
            'expired_at' => 'date|required|'
        ]);

		$data = Voucher::findOrFail($id);
		$data->type = $request->type;
		$data->code = $request->code;
		$data->min_amount = $request->min_amount;
		$data->percent = $request->percent;
		$data->max_discount = $request->max_discount;
		$data->amount = $request->amount;
		$data->quota = $request->quota;
		$data->expired_at = $request->expired_at;
		$data->save();

		Activity::add([
            'page' => 'Edit Voucher',
            'description' => 'Mengedit Voucher: '.$data->code
        ]);

        return redirect()->route('admin.vouchers')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Diupdate!'
        ]);
	}

	public function postDelete(){

	}

	public function getDetail(){
		
	}
}
