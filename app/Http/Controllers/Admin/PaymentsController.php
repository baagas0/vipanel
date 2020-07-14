<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;
use Activity;

class PaymentsController extends Controller
{
    public function getIndex(){
		$data['page_title'] = "Data Payments";

		return view('admin.payments.index', $data);
	}

	public function getAdd(){
		$data['page_title'] = "Data Payments";

		return view('admin.payments.form', $data);
	}

	public function postAdd(Request $request){
		$request->validate([
            'slug' => 'required|min:2|max:255|unique:payments',
            'name' => 'required|min:2|max:255',
            'rate' => 'required|numeric',
            'value' => 'required'
        ]);

		$data = New Payment;
		$data->slug = $request->slug;
		$data->name = $request->name;
		$data->rate = $request->rate;
		$data->value = $request->value;

		if ($request->is_bank == "on") {
			$is_bank = 1;
		}else{
			$is_bank = 0;
		}

		$data->is_bank = $is_bank;
		$data->save();

		Activity::add([
            'page' => 'Add Payments',
            'description' => 'Menambahkan Payments Baru: '.$data->name
        ]);

        return redirect()->route('admin.payments')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function getEdit($id){
		$data['page_title'] = "Edit Payments";
        $data['data'] = Payment::findOrFail($id);

        return view('admin.payments.form', $data);
	}

	public function postEdit($id, Request $request){
		$request->validate([
            'slug' => 'required|min:2|max:255|unique:payments,slug,'.$id,
            'name' => 'required|min:2|max:255',
            'rate' => 'required|numeric',
            'value' => 'required'
        ]);

		$data = Payment::findOrFail($id);
		$data->slug = $request->slug;
		$data->name = $request->name;
		$data->rate = $request->rate;
		$data->value = $request->value;

		if ($request->is_bank == "on") {
			$is_bank = 1;
		}else{
			$is_bank = 0;
		}

		$data->is_bank = $is_bank;
		$data->save();

		Activity::add([
            'page' => 'Edit Payments',
            'description' => 'Mengedit Payment: '.$data->name
        ]);

        return redirect()->route('admin.payments')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function postDelete($id){
		$data = Payment::findOrFail($id);
		$data->delete();

		return response()->json(true);
	}
}
