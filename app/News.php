<?php

namespace App;

use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    // public $timestamps = false;

    protected $fillable = [
        'title', 'keyword', 'description','content', 'status', 'post_count', 'post_count', 'cid', 'avatar','slug'
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
        $typeName = $type_name['title'];

        return $typeName;
    }

    // 新闻详情
    public static function getNewsInfo($id)
    {
        if (!isset($id)) {

            return 1;
        }
        
        $data = News::where('id', $id)->first()->toArray();

        return $data;
    }

    public function link($params = [])
    {
        return route('details', array_merge([$this->id, $this->slug], $params));
    }

    public $cache_key = 'web_links';
    
    protected $cache_expire_in_seconds = 1440 * 60;

    public function getAllCached()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出 links 表中所有的数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_seconds, function(){
            return $this->all();
        });
    }
}
