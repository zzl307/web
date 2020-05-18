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

    // 列表
    public function news()
    {
        return view('static_pages.news');
    }

    // 详情
    public function details()
    {
        return view('static_pages.details');
    }
}
