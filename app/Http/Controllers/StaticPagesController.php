<?php

namespace App\Http\Controllers;

use App\Banners;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    // 首页
    public function index(Banners $banners)
    {
        $data = Banners::where('status', 1)->get();

        return view('static_pages/index', compact('data'));
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
