<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'cid', 'status', 'post_count'
    ];

    public static function category()
	{
		$categorys = array();
		foreach (Category::all()->toArray() as $u)
		{	
			if ($u['cid'] == 0) {
				$category['cid_name'] = '一级分类';
			} else {
				$data = Category::where('id', $u['cid'])->first()->toArray();
				$category['cid_name'] = $data['name'];
			}

			$category['id'] = $u['id'];
			$category['name'] = $u['name'];
			$category['description'] = $u['description'];
			$category['cid'] = $u['cid'];
			$category['status'] = $u['status'];
			$category['post_count'] = $u['post_count'];
			$category['created_at'] = $u['created_at'];
			$category['updated_at'] = $u['updated_at'];

			$categorys[$u['id']] = $category;
		}

		return $categorys;
	}
}
