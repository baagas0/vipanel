<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Activity;

class NewsController extends Controller
{
    public function getIndex(){
		$data['page_title'] = "Data News";

		return view('admin.news.index', $data);
	}

	public function getAdd(){
		$data['page_title'] = "Data News";

		return view('admin.news.form', $data);
	}

	public function postAdd(Request $request){
        $request->validate([
            'title' => 'required|min:5|max:255',
            'category' => 'required_with:Info,Promo,Service,Update',
            'content' => 'required|min:5',
        ]);

		$data = New News;
        $data->title = $request->title;
        $data->category = $request->category;
        $data->content = $request->content;
        $data->save();


		Activity::add([
            'page' => 'Add News',
            'description' => 'Menambahkan News Baru: '.$data->title
        ]);

        return redirect()->route('admin.news')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function getEdit($id){
		$data['page_title'] = "Edit News";
        $data['data'] = News::findOrfail($id);

        return view('admin.news.form', $data);
	}

	public function postEdit($id, Request $request){
        $request->validate([
            'title' => 'required|min:5|max:255',
            'category' => 'required_with:Info,Promo,Service,Update',
            'content' => 'required|min:5',
        ]);

		$data = News::findOrfail($id);
        $data->title = $request->title;
        $data->category = $request->category;
        $data->content = $request->content;
        $data->save();


		Activity::add([
            'page' => 'Update News',
            'description' => 'Mengedit News: '.$data->title
        ]);

        return redirect()->route('admin.news')->with([
            'message_type' => 'success',
            'message'      => 'Data Berhasil Disimpan'
        ]);
	}

	public function postDelete(){

	}
}
