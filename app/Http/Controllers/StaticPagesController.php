<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    // 首页
    public function index()
    {
        return view('static_pages/index');
    }
}
