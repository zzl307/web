<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class NewController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    // 后台首页
    public function home()
	{	
		$data = News::all()->toArray();

		return view('new.news', compact('data'));
	}

	// 新闻发布
	public function store(News $news)
	{
		if (request()->isMethod('POST')) {
			$data = request()->all();
			
    		$news = $news->updateOrcreate(['id' => $data['id']], [
    			'title' => $data['title'],
    			'keyword' => $data['keyword'],
    			'description' => $data['description'],
    		]);

    		if ($news) {
    			return redirect()->back()->with('success', '操作成功');
    		}
    	}
	}

	// 新闻分类
	public function category(Category $categorys, Request $request)
	{	
		$data = Category::category();

		$page = $request->page ? : 1;
		$perPage = 15;
		$offset = ($page * $perPage) - $perPage;
		$total = count($data);
		$paginator = new LengthAwarePaginator(array_slice($data, $offset, $perPage, true), $total, $perPage, null, [
			'path' => $request->url(),
			'pageName' => 'page',
		]);

		return view('new.category', compact('data', 'paginator', 'total'));
	}

	// 新建分类
	public function categoryStore(Category $categorys)
	{
		if (request()->isMethod('POST')) {
			$data = request()->all();

			$categorys = $categorys->updateOrcreate(['id' => $data['id']], [
    			'name' => $data['name'],
    			'cid' => $data['cid'],
    			'description' => $data['name'],
			]);
			
			if ($categorys) {
    			return redirect()->back()->with('success', '操作成功');
    		}
		}
	}
}
