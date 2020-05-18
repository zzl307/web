<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    // 后台首页
    public function home()
	{
		return View('new.news');
	}
}
