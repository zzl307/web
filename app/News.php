<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    // public $timestamps = false;

    protected $fillable = [
        'title', 'keyword', 'description', 'status', 'post_count', 'post_count', 'cid', 'avatar'
    ];

    // 新闻分类
    public static function newsType()
    {
        $type = Category::all()->toArray();

        return $type;
    }

    // 新闻分类名称
    public static function type($cid)
    {   
        $type_name = Category::where('id', $cid)->first()->toArray();
        $typeName = $type_name['name'];

        return $typeName;
    }

    // 新闻详情
    public static function getNewsInfo($id)
    {
        $data = News::where('id', $id)->first()->toArray();

        return $data;
    }
}
