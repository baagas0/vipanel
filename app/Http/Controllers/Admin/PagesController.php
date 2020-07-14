<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use Activity;

class PagesController extends Controller
{
    public function getIndex()
    {
        $data['page_title'] = "Data Pages";

        return view('admin.pages.index', $data);
    }

    public function getAdd()
    {
        $data['page_title'] = "Add Page";

        return view('admin.pages.form', $data);
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5',
        ]);

        $data = new Page;
        $data->title = $request->title;
        $data->content = $request->content;

        if ($request->submit == 'draft') {
            $data->is_published = 0;
        } else {
            $data->is_published = 1;
        }

        $data->save();


        Activity::add([
            'page' => 'Add Page',
            'description' => 'Menambahkan Page Baru: ' . $data->title
        ]);

        return redirect()->route('admin.pages')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
    }

    public function getEdit($id)
    {
        $data['page_title'] = "Edit Page";
        $data['data'] = Page::findOrfail($id);

        return view('admin.pages.form', $data);
    }

    public function postEdit($id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5',
        ]);

        $data = Page::findOrfail($id);
        $data->title = $request->title;
        $data->content = $request->content;
        
        if ($request->submit == 'draft') {
            $data->is_published = 0;
        }else{
            $data->is_published = 1;
        }

        $data->save();


        Activity::add([
            'page' => 'Update Page',
            'description' => 'Mengedit Page: ' . $data->title
        ]);

        return redirect()->route('admin.pages')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
    }

    public function postDelete($id)
    {
        $data = Page::findOrFail($id);
        $data->delete();

        return response()->json(true);
    }
}
