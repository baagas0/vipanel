<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Activity;
use Hash;

class UsersController extends Controller
{
    public function getIndex(){
    	$data['page_title'] = "Data Users";

    	return view('admin.users.index', $data);
    }

    public function getAdd(){
    	$data['page_title'] = "Add User";

        return view('admin.users.form', $data);
    }

    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users|min:5|max:255',
            'password' => 'required|min:8|max:255',
            'balance' => 'required'
        ]);

        $data = New User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->email_verified_at = now()->format('Y-m-d H:i:s');
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->balance = $request->balance;
        $data->save();

        Activity::add([
            'page' => 'Add User',
            'description' => 'Menambahkan User Baru: '.$data->name
        ]);

        return redirect()->route('admin.users')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id){
        $data['page_title'] = "Edit User";
        $data['data'] = User::findOrFail($id);

        return view('admin.users.form', $data);
    }

    public function postEdit($id, Request $request){
        $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|unique:users,email,'.$id,
            'username' => 'required|min:5|max:255|unique:users,username,'.$id,
            'password' => 'nullable',
            'balance' => 'required'
        ]);

        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        
        $data->balance = $request->balance;
        $data->save();

        Activity::add([
            'page' => 'Add User',
            'description' => 'Mengedit Data User: '.$data->name
        ]);

        return redirect()->route('admin.users')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Diupdate!'
        ]);
    }

    public function getDetail($id){
        $data['page_title'] = "Detail User";
        $data['data'] = User::findOrFail($id);

        return view('admin.users.detail', $data);
    }

    public function getImport(){
        $data['page_title'] = "Import User";

        return view('admin.users.import', $data);
    }

    public function postImport(){
    	
    }
}
