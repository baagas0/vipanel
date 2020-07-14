<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Activity;

class SettingsController extends Controller
{
    public function getIndex(){
		$data['page_title'] = "Data Settings";

		return view('admin.settings.index', $data);
	}

	public function getAdd(){
		$data['page_title'] = "Data Settings";

		return view('admin.settings.form', $data);
	}

	public function postAdd(Request $request){
		$request->validate([
            'slug' => 'required|min:2|max:255|unique:settings',
            'name' => 'required|min:2|max:255',
            'value' => 'required'
        ]);

		$data = New Setting;
		$data->slug = $request->slug;
		$data->name = $request->name;
		$data->value = $request->value;
		$data->save();

		Activity::add([
            'page' => 'Add Settings',
            'description' => 'Menambahkan Settings Baru: '.$data->name
        ]);

        return redirect()->route('admin.settings')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function getEdit($id){
		$data['page_title'] = "Edit Settings";
        $data['data'] = Setting::findOrFail($id);

        return view('admin.settings.form', $data);
	}

	public function postEdit($id, Request $request){
		$request->validate([
            'slug' => 'required|min:2|max:255|unique:settings,slug,'.$id,
            'name' => 'required|min:2|max:255',
            'value' => 'required'
        ]);

		$data = Setting::findOrFail($id);
		$data->slug = $request->slug;
		$data->name = $request->name;
		$data->value = $request->value;
		$data->save();

		Activity::add([
            'page' => 'Edit Settings',
            'description' => 'Mengedit Settings: '.$data->name
        ]);

        return redirect()->route('admin.settings')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function postDelete($id){
		$data = Settings::findOrFail($id);
		$data->delete();

		return response()->json(true);
	}
}
