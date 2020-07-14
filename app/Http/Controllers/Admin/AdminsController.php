<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Activity;
use Hash;

class AdminsController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Data Admins";

    	return view('admin.data.index', $data);
    }

    public function getAdd(){
    	$data['page_title'] = "Add Admin";

        return view('admin.data.form', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|unique:admins',
            'username' => 'required|unique:admins|min:5|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $data = New Admin;
        $data->name = $request->name;
        $data->email = $request->email;
        // $data->email_verified_at = now()->format('Y-m-d H:i:s');
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->save();

        Activity::add([
            'page' => 'Add Admin',
            'description' => 'Menambahkan Admin Baru: '.$data->name
        ]);

        return redirect()->route('admin.data')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id){
        $data['page_title'] = "Edit Admin";
        $data['data'] = Admin::findOrFail($id);

        return view('admin.data.form', $data);
    }

    public function postEdit($id, Request $request){
        $data = Admin::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        
        // $data->balance = $request->balance;
        $data->save();

        Activity::add([
            'page' => 'Edit Admin',
            'description' => 'Mengedit Admin: '.$data->name
        ]);

        return redirect()->route('admin.data')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Diupdate!'
        ]);
    }

    public function postDelete($id){
        $data = Admin::findOrFail($id);

        Activity::add([
            'page' => 'Delete Admin',
            'description' => 'Menghapus Admin: '.$data->name
        ]);

        $data->delete();

        $response['message'] = "Data Berhasil Dihapus";

        return response()->json($response);
    }

    public function getDetail($id){
        $data['page_title'] = "Detail Admin";
        $data['data'] = Admin::findOrFail($id);

        return view('admin.data.detail', $data);
    }

    public function getImport(){
        $data['page_title'] = "Import Admin";

        return view('admin.data.import', $data);
    }

    public function postImport(){
    	
    }
}
