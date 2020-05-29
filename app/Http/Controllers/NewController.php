<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Handlers\ImageUploadHandler;
use Carbon\Carbon;

class NewController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    // 后台首页
    public function home()
	{	
		$data = News::orderBy('id', 'desc')->get()->toArray();
		// 新闻分类
		$type = News::newsType();
		foreach ($data as $key => $vo) {
			$data[$key]['type_name'] = News::type($vo['cid']);
		}

		$page = request()->page ? : 1;
		$perPage = 15;
		$offset = ($page * $perPage) - $perPage;
		$total = count($data);
		$paginator = new LengthAwarePaginator(array_slice($data, $offset, $perPage, true), $total, $perPage, null, [
			'path' => request()->url(),
			'pageName' => 'page',
		]);

		return view('new.news', compact('data', 'type', 'total', 'paginator'));
	}

	// 新闻发布
	public function store(News $news, ImageUploadHandler $uploader)
	{
		if (request()->isMethod('POST')) {
			$data = request()->all();

			if (request()->avatar) {
				$result = $uploader->save(request()->avatar, 'avatars', $news->id, 285);
				if ($result) {
					$data['avatar'] = $result['path'];
				}
			}

    		$news = $news->updateOrcreate(['id' => $data['id']], [
    			'title' => $data['title'],
    			'keyword' => $data['keyword'],
				'description' => $data['description'],
				'status' => 1,
				'cid' => $data['cid'],
				'post_count' => 1000,
				'avatar' => $data['avatar'],
    		]);

    		if ($news) {
				return redirect()->back()->with('success', '操作成功');
				// return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
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

	// 新闻详情
	public function getNewsInfo()
	{
		$news_id = request()->input('news_id');
		$new = News::getNewsInfo($news_id);

		return json_encode($new);
	}

	// 新闻删除
	public function deleteNews()
	{
		$id = request()->input('id');
		$new = News::find($id);

		if($new->delete()) {
			return 1;
		};
	}

	// 图片上传
	public function uploadImage(Request $request, ImageUploadHandler $uploader)
	{
		// 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'news', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
		}
		
        return $data;
	}

	// 新闻编辑
	public function newStore()
	{
		$id = request()->input('id');

		if (empty($id)) {
			return 1;
		}

		$new = News::where('id', $id)->first()->toArray();
		$new_type = News::type($new['cid']);
		$new['new_type'] = $new_type;

		return json_encode($new);
	}
}
