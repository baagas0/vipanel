<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use IrvanKede;

class PagesController extends Controller
{
	public function getIndex($title){
		$page = Page::where('title',$title)->first();

		$data['page_title'] = $page->title;
		$data['data'] = $page;

		return view('user.pages.app', $data);
	}
    public function getServices(){
    	$data['page_title'] = 'Daftar Layanan';
    	$data['data'] = IrvanKede::services();

    	return view('user.pages.services', $data);
    }
}
