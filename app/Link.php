<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // 边栏资源推荐
    protected $fillable = ['title', 'link'];

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
