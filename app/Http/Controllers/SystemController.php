<?php

namespace App\Http\Controllers;

use App\Banners;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\System;

class SystemController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }
    
    // banner管理
    public function index()
    {   
        $data = Banners::all();

        return view('system.index', compact('data'));
    }

    // 发布banner
    public function store(Banners $banners, ImageUploadHandler $uploader)
    {
        if (request()->isMethod('POST')) {
            $data = request()->all();

            if (empty($data['id'])) {
                $result = $uploader->save(request()->avatar, 'avatars', $banners->id, 1920);
                if ($result) {
                    $data['avatar'] = $result['path'];
                }
            }

    		$banners = $banners->updateOrcreate(['id' => $data['id']], [
    			'title' => $data['title'],
				'status' => $data['status'],
				'avatar' => $data['avatar'],
    		]);

    		if ($banners) {
				return redirect()->back()->with('success', '操作成功');
				// return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    		}
    	}
    }

    // 修改发布状态
    public function storeStutas()
    {
        $id = request()->input('id');

        $data = Banners::where('id', $id)->first();

        return json_encode($data);
    }

    // 删除Banner
    public function deleteDanners()
    {
        $id = request()->input('id');

        $banner = Banners::find($id);
        if ($banner->delete()) {
            return 1;
        }
    }

    // 网站优化
    public function system(System $system)
    {   
        if (request()->isMethod('POST')) {
            $data = request()->all();

    		$system = $system->updateOrcreate(['id' => $data['id']], [
    			'title' => $data['title'],
				'keyword' => $data['keyword'],
				'description' => $data['description'],
    		]);

    		if ($system) {
				return redirect()->back()->with('success', '操作成功');
    		}
        }
        
        $data = System::first();

        return view('system.system', compact('data'));
    }
}
