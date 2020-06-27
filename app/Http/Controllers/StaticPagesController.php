<?php

namespace App\Http\Controllers;

use App\Banners;
use App\Category;
use App\News;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticPagesController extends Controller
{
    // 首页
    public function index(Banners $banners, Category $category)
    {
        $data = Banners::where('status', 1)->get();
        $category_status = get_category_status();
        $tree = get_category_tree();

        // 新闻资讯
        $news = News::where('cid', 11)->take(8)->get();
        // 企业文化
        $company = News::where('cid', 12)->take(8)->get();
        // 案例展示
        $list = News::where('cid', 13)->take(8)->get();
        // 培训技术
        $training = News::where('cid', 14)->take(8)->get();
 
        // 网站优化
        $system = System::first();
        return view('static_pages/index', compact('data', 'category_status', 'tree', 'news', 'company', 'list', 'training', 'system'));
    }

    // 列表
    public function news(Category $category, News $news, $id)
    {   
        $new_category = Category::where('cid', $id)->get();
        if (blank($new_category)) {
            $cid = Category::where('id', $id)->first();
            $new_category = Category::where('cid', $cid->cid)->get();
        }

        if ($id == 1) {
            $category_id = Category::where('cid', $id)->get('id')->toArray();
            foreach ($category_id as $vo) {
                $categoryId[] = $vo['id'];
            }

            $new = DB::table('news')->whereIn('cid', $categoryId)->get();
        } else {
            $new = News::where('cid', $id)->get();
        }

        $category_status = get_category_status();
        $tree = get_category_tree();
        $category_title = $category->get_category_title($id);

        return view('static_pages.news', compact('category_status', 'tree','new_category', 'new', 'category_title'));
    }
 
    // 详情
    public function details(News $news, $id)
    {   
        $data = News::where('id', $id)->first();
        $previousNewsID = News::where('id', '<', $id)->max('id');
        $nextNewsId = News::where('id', '>', $id)->min('id');
        $previousNewsTitle = News::getNewsInfo($previousNewsID);
        $nextNewsTitle = News::getNewsInfo($nextNewsId);

        // URL 矫正
        if ( !empty($data->slug) && $data->slug != request()->slug) {

            return redirect($data->link(), 301);
        }

        $links = $news->getAllCached();

        $new = News::orderBy('id', 'desc')->first();

        $category_status = get_category_status();
        $tree = get_category_tree();

        return view('static_pages.details', compact('data', 'previousNewsID', 'nextNewsId', 'previousNewsTitle', 'nextNewsTitle', 'links', 'new', 'category_status', 'tree'));
    }
}
