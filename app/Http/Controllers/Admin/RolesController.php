<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function getIndex()
    {
        $data['page_title'] = "Roles";
        $data['data'] = Role::where('guard_name', 'admin')->get();

        return view('admin.roles.index', $data);
    }
}
