<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Admin;
use Auth;
use Hash;
use Image;
use Activity;

class AccountController extends Controller
{
    public function getIndex()
    {
        $data['page_title'] = "Account";
        $data['data'] = Auth::user('admin');

        return view('admin.account.index', $data);
    }

    public function postUpdate(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:5|max:255',
            'email' => 'required|unique:admins,email,' . auth('admin')->user()->id,
        ]);

        $data = Auth::user('admin');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = 'uploads/' . auth('admin')->user()->id . '/' . time() . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file)->resize(300, 300);
            $image->save(public_path($path));
            $data->photo = $path;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        Activity::add([
            'page' => 'Account',
            'description' => 'Memperbarui Data Akun',
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message' => 'Data Berhasil Diupdate!'
        ]);
    }

    public function getChangePassword()
    {
        $data['page_title'] = "Change Password";

        return view('admin.account.change-password', $data);
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'min:6', new MatchOldPassword],
            'new_password' => 'required|min:6',
            'new_confirm_password' => 'same:new_password|min:6',
        ]);

        $data = Auth::user('admin');
        $data->password = Hash::make($request->new_password);
        $data->save();

        Activity::add([
            'page' => 'Account',
            'description' => 'Mengubah Password Akun',
        ]);

        return redirect()->back()->with([
            'message_type' => 'success',
            'message' => 'Password Berhasil Diubah!'
        ]);
    }

    public function getLogs(){
        $data['page_title'] = "Log Activity";

        return view('admin.account.logs', $data);
    }
}
