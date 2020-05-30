<?php

namespace App\Http\Controllers;

use App\Banners;
use App\Category;
use App\News;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    // 首页
    public function index(Banners $banners, Category $category)
    {
        $data = Banners::where('status', 1)->get();
        $category_status = Category::where('cid', 0)->get();
        $category = collect(Category::all())->toArray();

        $tree = array();
        foreach($category as $category_data){
            $tree[$category_data['id']] = $category_data;
            $tree[$category_data['id']]['children'] = array();
        }
        foreach($tree as $key => $item){
            if($item['cid'] != 0){
                $tree[$item['cid']]['children'][] = &$tree[$key];
                if($tree[$key]['children'] == null){
                    unset($tree[$key]['children']);
                }
            }
        }
        foreach($tree as $key => $category){
            if($category['cid'] != 0){
                unset($tree[$key]);
            }
        }

        // 新闻资讯
        $news = News::where('cid', 11)->take(8)->get();
        // 企业文化
        $company = News::where('cid', 12)->take(8)->get();
        // 案例展示
        $list = News::where('cid', 13)->take(8)->get();
        // 培训技术
        $training = News::where('cid', 14)->take(8)->get();

        return view('static_pages/index', compact('data', 'category_status', 'tree', 'news', 'company', 'list', 'training'));
    }

    // 列表
    public function news()
    {
        return view('static_pages.news');
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

        return view('static_pages.details', compact('data', 'previousNewsID', 'nextNewsId', 'previousNewsTitle', 'nextNewsTitle', 'links', 'new'));
    }
}
