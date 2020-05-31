<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Laravelium\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function index(Sitemap $sitemap, News $new)
    {   
        $sitemap->setCache('larabbs.sitemap', 60);
        if (!$sitemap->isCached()) {
            $sitemap->add(route('index'), null, '1.0', 'daily');

            $new->orderBy('updated_at', 'desc')->chunk(500, function($news) use ($sitemap) {
                foreach($news as $new) {
                    $sitemap->add($new->link(), $new->updated_at->toAtomString(), 0.8, 'daily');
                }
            });
        }
        
        return $sitemap->render('xml');
    }
}
